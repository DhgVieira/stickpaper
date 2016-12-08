<?php

namespace App\Http\Controllers;

use App\Repositories\client;
use App\Repositories\order;
use App\Repositories\products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $orders = order::paginate(15);
        return view('orders.order')->with('orders', $orders);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newAction()
    {
        $client = client::all();
        $product = products::all();
        return view('orders.neworder')
            ->with('clients', $client)
            ->with('products', $product);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createAction (Request $request)
    {
        try {

            $order = new order();
            $order->order_number = 'STICK'.$order->id;
            $order->cost = $request->request->get('cost');
            $order->qty = $request->request->get('qty');
            $order->client_id = $request->request->get('client');
            $order->product_id = $request->request->get('product');
            $order->status_id = 1;
            $date = strtotime($request->request->get('agreement'));
            $order->agreement_at =  date('Y-d-m H:i:s', $date);
            $order->save();

            $request->session()->flash('message-success', 'Produto Cadastrado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Produto não Cadastrado!'.$e->getMessage());
        }

        return Redirect::to('/order');
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this
     */
    public function editAction($id, Request $request)
    {
        $order = order::where('id', $id)->first();
        $client = client::all();
        $product = products::all();
        if (!$order) {
            $request->session()->flash('message-error', 'Não foi possivel encontrar o Pedido!');
            return Redirect::to('/order');
        }

        return view('orders.editorder')->with('order', $order)
            ->with('clients', $client)
            ->with('products', $product);;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateAction(Request $request)
    {
        $order = order::where('id', $request->request->get('id'))->first();

        if (!$order) {
            $request->session()->flash('message-error', 'Produto não Cadastrado!');
            return Redirect::to('/order');
        }
        try {
            $order->order_number = 'STICK'.$order->id;
            $order->cost = $request->request->get('cost');
            $order->qty = $request->request->get('qty');
            $order->client_id = $request->request->get('client');
            $order->product_id = $request->request->get('product');
            $order->status_id = 1;
            $date = strtotime($request->request->get('agreement'));
            $order->agreement_at =  date('Y-d-m H:i:s', $date);
            $order->update();

            $request->session()->flash('message-success', 'Produto atualizado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel atualizar os dados do Produto! '. $e->getMessage());
        }
        return Redirect::to('/order');

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function removeAction(Request $request, $id)
    {
        $order = products::where('id', $id);

        if (!$order) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o produto!');
            return Redirect::to('/order');
        }
        try {
            $order->delete();

            $request->session()->flash('message-success', 'Produto excluido com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o produto!');
        }
        return Redirect::to('/order');

    }
}
