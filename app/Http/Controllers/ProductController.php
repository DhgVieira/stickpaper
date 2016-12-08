<?php

namespace App\Http\Controllers;

use App\Repositories\products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $product = products::paginate(15);
        return view('products.product')->with('products', $product);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function newAction(Request $request)
    {
        $returnUrl = $request->session()->previousUrl();
        return view('products.newproduct')->with('urlPrevious', $returnUrl);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createAction (Request $request)
    {
        try {
            $product = new products();
            $product->name = $request->request->get('nameProduct');
            $product->price = $request->request->get('price');
            $product->length = $request->request->get('length');
            $product->save();
            $request->session()->flash('message-success', 'Produto Cadastrado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Produto não Cadastrado!'.$e->getMessage());
        }

        return Redirect::to($request->request->get('url'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this
     */
    public function editAction($id, Request $request)
    {
        $returnUrl = $request->session()->previousUrl();
        $product = products::where('id', $id)->first();
        if (!$product) {
            $request->session()->flash('message-error', 'Não foi possivel encontrar o produto!');
            return Redirect::to($request->session()->previousUrl());
        }

        return view('products.editproduct')->with('product', $product)->with('urlPrevious', $returnUrl);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateAction(Request $request)
    {
        $product = products::where('id', $request->request->get('id'))->first();

        if (!$product) {
            $request->session()->flash('message-error', 'Produto não Cadastrado!');
            return Redirect::to($request->request->get('url'));
        }
        try {
            $product->name = $request->request->get('nameProduct');
            $product->price = $request->request->get('price');
            $product->length = $request->request->get('length');
            $product->update();

            $request->session()->flash('message-success', 'Produto atualizado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel atualizar os dados do Produto!');
        }
        return Redirect::to($request->request->get('url'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function removeAction(Request $request, $id)
    {
        $product = products::where('id', $id);

        if (!$product) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o produto!');
            return Redirect::to('/product');
        }
        try {
            $product->delete();

            $request->session()->flash('message-success', 'Produto excluido com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel excluir o produto!');
        }
        return Redirect::to($request->session()->previousUrl());

    }
}
