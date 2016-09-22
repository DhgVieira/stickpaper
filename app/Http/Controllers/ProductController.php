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
        $product = products::all();
        return view('adminlte::products.product')->with('products', $product);
    }

    public function newAction()
    {
        return view('adminlte::products.newproduct');
    }

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

        return Redirect::to('/product');
    }
}
