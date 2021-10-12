<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() //palauttaa kaiken
    {
        return Client::all();
    }
 
    public function show(Client $client)
    {
        return $client;             //palauttaa halutun id:en
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());  //Tehdään uusi tallennus

        return response()->json($client, 201);      
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());       //Päivitetään haluttu id

        return response()->json($client, 200);
    }

    public function delete(Client $client)
    {
        $client->delete();      //Poistetaan haluttu id

        return response()->json(null, 204);
    }
}
