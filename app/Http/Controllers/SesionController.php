<?php

namespace App\Http\Controllers;

use App\Models\CaoUsuario;
use Illuminate\Http\Request;
use Session;
use Auth;
use Laracasts\Flash\Flash;
use Alert;
use Illuminate\Support\Facades\DB;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        return redirect()->action('ComercialController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
      
        $consultarUsuario=CaoUsuario::where('no_email', '=', $request->no_email)->where('ds_senha',$request->password)->first();
       //dd($consultarUsuario->no_usuario);
        if (!empty($consultarUsuario)) {
            Alert::success('Hola !', 'Bienvenido al Sistema.')->persistent("Ok");
            flash('Hola <b>'.$request->no_email.'!</b>,  Bienvenido al Sistema', 'success');
            Session::put('usr',$request->no_email);
            Session::put('nom',$consultarUsuario->no_usuario);
            return redirect()->action('SesionController@index');
            
        }else{
            Alert::warning('Usuario no Encontrado!', 'El Usuario o Contraseña ingresado Invalido.')->persistent("Ok");
            return redirect('/');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaoUsuario  $caoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(CaoUsuario $caoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaoUsuario  $caoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(CaoUsuario $caoUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaoUsuario  $caoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaoUsuario $caoUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaoUsuario  $caoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaoUsuario $caoUsuario)
    {
        //
    }

    //logout del sistema
    protected function logout(){


        Session::flush();
        Auth::logout();

        Alert::success('Hasta Luego!', 'Gracias por su Visita.')->persistent("Ok");

        return redirect('/');

    }
}
