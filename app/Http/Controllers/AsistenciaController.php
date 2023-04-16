<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\asistencia;
use Illuminate\Http\Request;
use Exception;

class AsistenciaController extends Controller
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
            try{
                    $request->input('situacion');
                    $asistencia = asistencia::where('clase_id', $request->input('clase'))->where('estudiante_id', $request->input('estudiante'))->get();
                
                    if(!empty($asistencia[0])){ //Esto es que ya hay una solicitud de ese horario
                        return response('Asistencia para esta clase ya existe', 400);
                    }
                    $nuevaAsistencia = new asistencia(); 
                    $nuevaAsistencia->clase_id = $request->input('clase');
                    $nuevaAsistencia->estudiante_id = $request->input('estudiante');
                    $nuevaAsistencia->presencialidad = $request->input('presencialidad');
                    $nuevaAsistencia->save();
                    return response('Agregado exitosamente', 200);
            }catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                return response('Error al agregar asistencia porque se dio un error', 400);
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
        $asistencia = asistencia::where('clase_id', $id)->get();
        return $asistencia;
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
