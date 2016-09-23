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

    public function createAction(Request $request)
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
        } catch (\Exception $e) {
            $request->session()->flash('message-error', 'Cliente não Cadastrado!' . $e->getMessage());
        }

        return Redirect::to('/client');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function editAction($id, Request $request)
    {
        $client = client::where('id', $id)->first();
        if (!$client) {
            $request->session()->flash('message-error', 'Não foi possivel encontrar o cliente!');
            return Redirect::to('/client');
        }

        return view('adminlte::clients.editclient')->with('clients', $client);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateAction(Request $request)
    {
        $client = client::where('id', $request->request->get('id'))->first();

        if (!$client) {
            $request->session()->flash('message-error', 'Cliente não Cadastrado!');
            return Redirect::to('/client');
        }
        try {
            $client->name = $request->request->get('nameClient');
            $client->email = $request->request->get('email');
            $client->document = $request->request->get('document');
            $client->city = $request->request->get('city');
            $client->neighborhood = $request->request->get('neighborhood');
            $client->number = $request->request->get('number');

            $client->update();

            $request->session()->flash('message-success', 'Cliente atualizado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel atualizar os dados do cliente!');
        }
        return Redirect::to('/client');

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function removeAction(Request $request, $id)
    {
        $client = client::where('id', $id);

        if (!$client) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o cliente!');
            return Redirect::to('/client');
        }
        try {
            $client->delete();

            $request->session()->flash('message-success', 'Cliente excluido com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o cliente!');
        }
        return Redirect::to('/client');

    }
}
