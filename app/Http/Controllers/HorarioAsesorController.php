<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\asesor;
use App\Models\horario_asesor;
use App\Models\estudiante;
use App\Models\User;



class HorarioAsesorController extends Controller
{

    public function tablaHorarios(){
        $id = Auth::user()->id;        
//        $horario = asesor::find($id)->horario_asesor;
//        $datos = [$horario];
//        return view('layouts/tabla_horarios_asesor')->with('horarios',$datos);
        $id = Auth::user()->id;
        $rol = Auth::user()->rol;
//        if($rol == 2){        
        $asesor = asesor::find($id)->user;
        $horario = asesor::find($id)->horario_asesor;
        $datos = [$asesor, $horario, $rol];
        return view('layouts/tabla_horarios_asesor')->with('datos',$datos);
//        }else{
//            $asesor = asesor::find($id)->user;
//            $datos = [$asesor,0,0,0,$rol];
//            return view('tabla_estudiantes')->with('estudiantes',$datos);
//        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horarios-citas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Auth::user()->id;
        $horarios = horario_asesor::where('asesor_id', $id)->get();
        $data = array();
        foreach($horarios as $row)
        {
            $data[] = array(
            'id'   => $row["id"],
            'title'   => $row["titulo"],
            'start'   => $row["inicio"],
            'end'   => $row["final"]
            );
            }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*


        $horario = new horario_asesor;
        $horario->asesor_id = $request->input('idAsesor');
        $horario->hora_inicio = $request->input('horaInicio');
        $horario->hora_final = $request->input('horaFinal');
        $horario->dia = $request->input('dia');
        $horario->save();
        return view('Asesor/HorarioAsesor');
        */

        //Creo que aqui es donde esta el problema y creo que no cubro todas las situaciones posibles
        // Como si el sql me da un error al insertar


        //Aqui valido si ya se ingreso el horario para la misma fecha y hora

        $id = Auth::user()->id;
            if(isset($_POST["horarios"])){
                        $array = json_decode($_POST["horarios"]);
                $horarios = horario_asesor::where('asesor_id', $id)->where('inicio', $array->inicio)->get();
                echo $horarios;
                if(!empty($horarios[0])){
                    $message = $array->inicio;
                    return response()->json([
                        'status'=> 'Error', 
                        'message' => $message, 
                    ]);
                }
                $horario = new horario_asesor;                
                $horario->asesor_id = $id;
                $horario->inicio = $array->inicio;
                $horario->final = $array->final;
                $horario->titulo = $array->titulo;
                $horario->save();
            }
            else{
                echo "something went wrong";
            }
            
        /*
        
        $horario = new horario_asesor;
        $horario->id = 4;
        $horario->asesor_id = $id;
        $horario->inicio = $request->inicio;
        $horario->final = $request->final;
        $horario->titulo = $request->titulo;
        $horario->save();
        return response()->json($horario);
        */
        /*
        return response()->json([
            'status'=> 'Success', 
            'message' => 'Ingresado correctamente', 
        ]);
        */

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
