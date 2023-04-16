<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\horario_asesor;
use App\Models\seguimiento;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Seguimiento/citasSeguimientos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $horarios = horario_asesor::all();
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

        $id = Auth::user()->id;
            if(isset($_POST["horario"])){
                
                $array = json_decode($_POST["horario"]);
                //guardamos el seguimiento y buscamos el horario para actualizarlo
                $horario = horario_asesor::where('id', $array->id)->first();
                
                $seguimiento = new seguimiento;
                $seguimiento->id = 0;
                $seguimiento->descripcion = 'Cita para seguimiento';
                $seguimiento->horario_asesor_id = $horario->id;
                $seguimiento->estudiante_id = $id;
                $seguimiento->save();
                
                
                //Actualizar el horario para que ya no salga disponible y que al asesor le salga con quien es el seguimiento

                //Antes estaba asi:
                //$horario->titulo = "Seguimiento asignado: ".Auth::user()->name." de cedula: ".$id;

                $horario->titulo = "Seguimiento asignado";
                $horario->save(); //Save tambien sirve para actualizar un registro ya existente
                
                return response('Success',200);
            }
            else{
                return response('Error',404);
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
