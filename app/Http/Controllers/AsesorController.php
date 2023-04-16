<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\referencia;
use App\Mail\referenciamail;
use App\Models\asesor;
use App\Models\User;




class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = asesor::find(Auth::user()->id)->user;
        return view('Asesor/inicioAsesor')->with('usuario',$usuario);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $asesores = user::where('rol', 2)->get();
        
        return view('SuperAdministrador/Asesores')->with('asesores',$asesores);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asesor = asesor::findOrFail($id);
        $asesor->delete();
        $user = user::findOrFail($id);
        $user->delete();
        return $this->show();
    }

    public function listar()
    {
        $data = '[';

        foreach (asesor::all() as $asesor) {
            $user = User::find($asesor->id);

            $temp = array(
                'id' => $asesor->id,
                'nombre' => $user->name,
                'apellido' => $user->apellido
            );
            $data = $data . json_encode($temp) . ',';
        }
        $data = substr($data, 0, -1);
        $data = $data . ']';
        return $data;
    }
}

