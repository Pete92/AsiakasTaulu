@extends('layout')

@section('content')
<div class="container" id="container-data">

    <div class="px-5">
        <div class="row">
            <div class="col"></div>
            <div class="col-xl-12 text-center mt-5">
                <h3>Autokouluun rekisteröityneet asiakkaat</h3>
            </div>
            <div class="row">
                <div class="col ilmoitus">
                </div>
                <div class="col-auto">
                    <a href="{{url('store')}}" class="btn btn-outline-light store" tabindex="-1" role="button" >Lisää uusi asiakas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-wrapper">
    <table class="table">
        <thead>
            <tr></tr>
        </thead>
        <tbody class="data"></tbody>
    </table>
    </div>
</div>


<script>
    $(document).ready(function(){
        //Headerin otsikot loopataan arraysta näkyville
        let header = [
            'Luokka', 'Etunimi', 'Sukunimi', 'Email',
            'Osoite', 'Kaupunki', 'Postinum', 'Puhelin', 'Toiminto'
        ];
        for(var x = 0; x < header.length; x++){
            $('tr').append(`<th scope="col" >${header[x]} <i class="fas fa-sort"></i></th>`);
        }

        //uusi asiakas linkki keskelle mobiilissa
        if (window.matchMedia("(max-width: 500px)").matches) {
            $('.col-auto').attr('class', 'col-9');
            console.log("hei");
        }

        //Haetaan data tietokannasta ja näytetään sivulla
        $.ajax({
            url: "http://127.0.0.1:8000/api/data",
            type: "GET",
            dataType: "json",
            success: function(data){
                //Jos on dataa niin otetaan divin class pois, table rakenne näyttää vähän paremmalta.
                if(data.length > 0){
                    $('#container-data').attr('class', '');
                }
                for(var i = 0; i < data.length; i++){
                    $('.data').append(`<tr>
                    <td>${data[i].class}</td>
                    <td>${data[i].fName}</td>
                    <td>${data[i].lName}</td>
                    <td>${data[i].email}</td>
                    <td>${data[i].address}</td>
                    <td>${data[i].city}</td>
                    <td>${data[i].zipCode}</td>
                    <td>${data[i].phone}</td>
                    <td><a href="{{url('update/${data[i].id}')}}" class="linkki"><i class="fas fa-pen"></i></a>
                    <i data-id="${data[i].id}" class="fas fa-trash"></i></td>
                    </tr>`);
                }

                //Kun roskakoria painetaan poistetaan tämä id
                $('.fa-trash').on('click', function(event){
                    let numero = $(this).attr('data-id');
                    //Delete pyyntö
                    $.ajax({
                        url: `http://127.0.0.1:8000/api/data/${numero}`,
                        type: 'DELETE',
                        success: function(){
                            $('.ilmoitus').append('<div class="col-xl-4"><div class="alert alert-success" role="alert"><b>Käyttäjä poistettu</b></div></div>');
                            $( event.target ).closest( "tr" ).remove(); //Poistetaan näkyvistä lähin <tr></tr>
                            remove_append(); //poistaa alertin 2 sekunnin jälkeen
                        },
                        error:function(error){
                            $('.ilmoitus').append('<div class="col-xl-4"><div class="alert alert-danger" role="alert"><b>Epäonnistui</b></div></div>'); 
                            remove_append();
                        }
                    });
                });
            }
        });

        //Vaihtaa järjestystä tablessa, ottaa huomioon kirjaimet ja numerot
        $('th').click(function(){
            var table = $(this).parents('table').eq(0)
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
            this.asc = !this.asc
            if (!this.asc){rows = rows.reverse()}
            for (var i = 0; i < rows.length; i++){table.append(rows[i])}
        })
        function comparer(index) {
            return function(a, b) {
                var valA = getCellValue(a, index), valB = getCellValue(b, index)
                return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
            }
        }
        function getCellValue(row, index){ return $(row).children('td').eq(index).text() }

        //Poistetaan ilmoitus 2 sekunnin jälkeen
        function remove_append(){
            setTimeout(function(){ $(".alert").remove('.alert');}, 2000 );
        };
        
        


    });
</script>
@endsection


