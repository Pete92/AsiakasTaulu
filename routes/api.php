<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ClientController;  //Controlleri käyttöön, jotta voidaan kutsua reitit

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





Route::get('data', [ClientController::Class,'index']);      //Hakee kaikki Datat
 
Route::get('data/{client}', [ClientController::Class,'show']);  //Näytetään haluttu Data

Route::post('data', [ClientController::Class,'store']);     //Tallennetaan uusi Data

Route::put('data/{client}', [ClientController::Class,'update']);//Päivitetään uusi Data

Route::delete('data/{client}', [ClientController::Class,'delete']);//Poistetaan haluttu Data

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
