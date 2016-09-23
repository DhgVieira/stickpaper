<?php

namespace App\Http\Controllers;

use App\Repositories\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('adminlte::auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $data = $request->request->all();
        try {
            $this->validator($data);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'admin' => isset($data['admin']) ? 1 : 0,
                'password' => bcrypt($data['password']),
                'remember_token' => true,
            ]);
            $request->session()->flash('message-success', 'Usuário Cadastrado com sucesso!');
        }
        catch (\Exception $e) {
            $request->session()->flash('message-error', 'Não foi possivel cadastrao o usuário! erro:'.$e->getMessage());
        }
        return Redirect::to('/home');
    }

}
