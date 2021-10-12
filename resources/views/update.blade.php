@extends('layout')

@section('content')
<div class="container input-user">
    <form class="row g-3">
        <div class="success"></div>
        <div class="col-xl-12 text-center">
            <br>
            <br>
            <h3>Päivitä Käyttäjän tietoja</h3>
            <br>
        </div>    
        <div class="col-xl-8"></div>
        <div class="row">
          <div class="col ilmoitus">
          </div>
          <div class="col-auto">
              <a href="{{url('/')}}" class="btn btn-outline-light" tabindex="-1" role="button" >Palaa takaisin</a>
          </div>
      </div>

        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Etunimi</label>
          <input type="text" class="form-control" value="" id="inputfName">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Sukunimi</label>
          <input type="text" class="form-control" value="" id="inputlName">
        </div>
        <div class="col-10">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" class="form-control" value="" id="inputEmail" placeholder="osakoddo">
          </div>
          <div class="col-2">
            <label for="inputZip" class="form-label">Luokka</label>
            <input type="text" class="form-control" value="" id="inputClass">
          </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Osoite</label>
          <input type="text" class="form-control" value="" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Kaupunki</label>
          <input type="text" class="form-control" value="" id="inputCity">
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="text" class="form-control" value="" id="inputZip">
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Puhelin</label>
            <input type="text" class="form-control" value="" id="inputPhone">
        </div>
          
        <div class="col-12">
          <button type="submit" class="btn btn-primary paivita">Päivitä</button>
        </div>
      </form>
</div>


<script>
    $(document).ready(function(){
      //katosii urlista numeron
        var APP_URL = window.location.pathname.split( '/' );
        let id = APP_URL[2];

        //Haetaan lomakkeelle tiedot
        $.ajax({
            url: `http://127.0.0.1:8000/api/data/${id}`,
            type: "GET",
            dataType: "json",
            success: function(data){
                $('#inputfName').val(data.fName);
                $('#inputlName').val(data.lName);
                $('#inputEmail').val(data.email);
                $('#inputClass').val(data.class);
                $('#inputAddress').val(data.address);
                $('#inputCity').val(data.city);
                $('#inputZip').val(data.zipCode);
                $('#inputPhone').val(data.phone);
            }
        });
        //Tallennetaan uudet tiedot
        $('.paivita').on('click', function(event){
            event.preventDefault();
            let paivitys = new Object();
            paivitys.lName = $('#inputfName').val();
            paivitys.lName = $('#inputlName').val();
            paivitys.email = $('#inputEmail').val();
            paivitys.class = $('#inputClass').val();
            paivitys.address = $('#inputAddress').val();
            paivitys.city = $('#inputCity').val();
            paivitys.zipCode = $('#inputZip').val();
            paivitys.phone = $('#inputPhone').val();
            $.ajax({
                url: `http://127.0.0.1:8000/api/data/${id}`,
                type: 'PUT',
                dataType: 'json',
                data: paivitys,
                success: function(data){
                  $('.ilmoitus').append('<div class="col-xl-4"><div class="alert alert-success" role="alert">Päivitys onnistui!</div></div>');
                  ohjaus(); //Ohjaa takaisin etusivulle
                },
                error: function(){
                  $('.ilmoitus').append('<div class="col-xl-4 alert alert-danger" role="alert">Ongelma päivityksessä!<br><small>Tarkasta onko kaikki täytetty.</small></div>');
                  remove_append();  //Poistaa alertin 2 sekunnin kuluttua
                }

            });
        });
        //Ohjaus takaisin pääsivulle
        function ohjaus(){
            window.setTimeout(function () {
              location.href = "http://127.0.0.1:8000/";
            }, 1500);
            }
        //Poistetaan ilmoitus 2 sekunnin jälkeen
        function remove_append(){
            setTimeout(function(){ $(".alert").remove('.alert');}, 2000 );
        };
    });
</script>

@endsection