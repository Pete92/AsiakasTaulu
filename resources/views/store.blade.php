@extends('layout')

@section('content')
    <div class="container input-user">
          <div class="row">
            <div class="col-xl-12 mt-5 text-center"><h3>Kirjaa ylös uusi asiakas</h3></div>
            <div class="col-xl-2"></div>
            <div class="row">
              <div class="col ilmoitus"></div>
              <div class="col-auto">
                  <a href="{{url('/')}}" class="btn btn-outline-light" tabindex="-1" role="button" >Etusivulle</a>
              </div>
          </div>
          </div>
          <form class="row g-3">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Etunimi</label>
              <input type="text" class="form-control" id="inputfName">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Sukunimi</label>
              <input type="text" class="form-control" id="inputlName">
            </div>
            <div class="col-10">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="">
              </div>
              <div class="col-2">
                <label for="inputZip" class="form-label">Luokka</label>
                <input type="text" class="form-control" id="inputClass">
              </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Osoite</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Kaupunki</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Puhelin</label>
                <input type="text" class="form-control" id="inputPhone">
            </div>
              
            <div class="col-12">
              <button type="submit" class="btn btn-primary tallenna">Tallenna</button>
            </div>
          </form>
    </div>


    <script>
        $(document).ready(function(){
            $('.tallenna').on('click', function(event){
                event.preventDefault();
                //var number = $('#inputPhone').val();
                let tiedot = new Object()
                tiedot.class = $('#inputClass').val();
                tiedot.fName = $('#inputfName').val();
                tiedot.lName = $('#inputlName').val();
                tiedot.email = $('#inputEmail').val();
                tiedot.address = $('#inputAddress').val();
                tiedot.city = $('#inputCity').val();
                tiedot.zipCode = $('#inputZip').val();
                tiedot.phone = $('#inputPhone').val();
                //tiedot.phone = createPhoneNumber(number);

               $.ajax({
                   url: "http://127.0.0.1:8000/api/data", //Tallenetaan objecti tänne url:iin
                   type: "POST",
                   dataType: "json",
                   data: tiedot,
                   success: function(){
                       $('.ilmoitus').append('<div class="col-xl-4"><div class="alert alert-success"  role="alert">Lisäys onnistui!</div></div>');
                       ohjaus();  //ohjaa käyttäjän takaisin pääsivulle
                   },
                   error: function(){
                      $('.ilmoitus').append('<div class="col-xl-4 alert alert-danger" role="alert">Ongelma lisäyksessä!<br><small>Tarkasta onko kaikki täytetty.</small></div>');
                      remove_append();  //Poistaa alertin 2 sekunnin jälkeen
                   }
               });
            });
            //Ohajataan käyttäjä etusivulle
            function ohjaus(){
              window.setTimeout(function () {
                location.href = "http://127.0.0.1:8000/";
              }, 1500);
            }
             //puhelinnumeron muuttaja.. Kesken vielä
            function createPhoneNumber(number) {
                  let numeroPituus = number.length;
                  let format;
                  if(numeroPituus == 10){
                    //(+358) 040 123 1234
                    format = "(+358) xxx xxx xxxx";
                  } else if(numeroPituus == 11){
                    //(+358) 0400 12 1234
                    format = "(+358) xxxx xxx xxxx";
                  } else if (numeroPituus == 9){
                    //0600 10 100
                    format = "xxxx xx xxx";
                  } else {
                    return console.log("Numeron pituus voi olla vain 9-11");
                  }

                for (let i = 0; i < number.length; i++) {
                    format = format.replace('x', number[i]);
                }

                return format;
            }
            //Poistetaan ilmoitus 2 sekunnin jälkeen
            function remove_append(){
                setTimeout(function(){ $(".alert").remove('.alert');}, 3000 );
              };
        });
    </script>
@endsection