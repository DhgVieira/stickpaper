<?php

namespace App\Http\Controllers;

use App\Repositories\client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $client = client::all();
        return view('adminlte::clients.client')->with('clients', $client);
    }

    public function newAction()
    {
        return view('adminlte::clients.newclient');
    }

    public function createAction (Request $request)
    {
        try {

            $client = new client();
            $client->name = $request->request->get('nameClient');
            $client->email = $request->request->get('email');
            $client->document = $request->request->get('document');
            $client->city = $request->request->get('city');
            $client->neighborhood = $request->request->get('neighborhood');
            $client->number = $request->request->get('number');
            $client->save();

            $request->session()->flash('message-success', 'Cliente Cadastrado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Cliente não Cadastrado!'.$e->getMessage());
        }

        return Redirect::to('/client');
    }
}
