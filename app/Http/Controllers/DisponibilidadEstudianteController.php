<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\disponibilidad_estudiante;

class DisponibilidadEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id = Auth::user()->id;
            if(isset($_POST["horarios"])){
                $array = json_decode($_POST["horarios"]);
                $horarios = disponibilidad_estudiante::where('estudiante_id', $id)->where('dia', $array->dia)->where('hora', $array->horaInicio)->get();
                echo $horarios;
                if(!empty($horarios[0])){ //Esto es que ya hay una solicitud de ese horario
                    $message = $array->inicio;
                    return response()->json([
                        'status'=> 'Error', 
                        'message' => $message, 
                    ]);
                }
                $disponibilidadhorario = new disponibilidad_estudiante;                
                $disponibilidadhorario->estudiante_id = $id;
                $disponibilidadhorario->dia = $array->dia;
                $disponibilidadhorario->hora = $array->horaInicio;
                $disponibilidadhorario->save();
            }
            else{
                echo "something went wrong";
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
