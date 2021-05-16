<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        $data = request()->validate([
            'client_name' =>'required',
            'client_phone_number' =>'required',
            'client_email' =>'required|email',
            'client_code' =>'required',
            'client_VAT_code' =>'required',
            'client_address' =>'required',
        ]);

        Clients::create($data);

        return redirect('/clients');
    }


    public function show($client) //pasiima duomenis
    {
//        $client = Clients::find($client);
        $client = Clients::where('client_id', $client)->first();
//        dd($client);
        return view('clients.edit', ['clients' => $client]);

    }


    public function edit(Clients $clients)
    {
        return view('clients.edit', compact('clients'));
    }


    public function update(Request $request, $id)
    {
        // validating incoming data from $request object
        $data = request()->validate([
            'client_name' =>'required',
            'client_phone_number' =>'required',
            'client_email' =>'required|email',
            'client_code' =>'required',
            'client_VAT_code' =>'required',
            'client_address' =>'required',
        ]);

        // updating clients table with validated fields from $request
        Clients::where("client_id", $id)->update([
            "client_name" => $request->client_name,
            "client_phone_number" => $request->client_phone_number,
            "client_email" => $request->client_email,
            "client_code" => $request->client_code,
            "client_VAT_code" => $request->client_VAT_code,
            "client_address" => $request->client_address,
        ]);

        // querying database to get all clients with one updated client
        $updatedClients = Clients::all();

        // returning clients index view with updated clients
        return view('clients.index', ['clients' => $updatedClients]);
    }

    public function destroy(Clients $clients, $id) // Veikia, bet tik tada kai yra dar papildomai darasytas $id TODO
    {
//        dd($id);
        Clients::where("client_id", $id)->delete(); // Veikia !
//        $id->delete();
        return redirect("/clients");
    }

    public function getClient() {

//        $client = 'Valentins';
        dd('here');
        return view('clients.find-results', ['result' => $client]);
    }

//    public function search()       //neveikia...
//    {
//        $search_text = $_GET['query'];
//        $clients = Clients::where('title', 'LIKE', '%'.$search_text.'%')->get();
//
//        return view('clients.search',compact('clients'));
//    }


}
