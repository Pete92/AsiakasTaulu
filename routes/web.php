<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/* Reitit palauttaa vain blade.tiedoston joka näytetään käyttäjälle.
Blade sivuissa käytetty jquerya joka kutsuu api.php:sta reitit ja nämä
apin reitit hakee tietokannasta datan json muodossa
*/

Route::get('/', function () {  //Etusivu
    return view('index');
});
 
Route::get('/store', function () {      //Uusi Tallennus sivu
    return view('store');
});

Route::get('/update/{id}', function () {//Päivitys sivu    
    return view('update');
});


