<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\estudiante;
use App\Models\clase;
use App\Models\detalle_curso;
use App\Models\curso;
use App\Models\aula;
use App\Models\tutor;
use App\Models\lista_curso_estudiante;
use App\Models\reunion;
use Exception;

class CalendarioEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id)->user;
        return view('Estudiante/calendarioEstudiante')->with('estudiante',$estudiante);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            $datos = array();
            $cont = 0;
            $data = '[';
            $id = Auth::user()->id;
            $listacursos = lista_curso_estudiante::where('estudiante_id', $id)->get();
            foreach ($listacursos as $lista) {
                $detalle = detalle_curso::find($lista->detalle_curso_id);
                $curso = curso::find($detalle->curso_codigo);
                $clasesPorDetalle = clase::where('detalle_curso_id',$detalle->id)->get();
                foreach ($clasesPorDetalle as $clase) {
                    $temp = array(
                    'id' => $clase->id,
                    'title' => $curso->nombre,
                    'clase_id' => $clase->id,
                    'start' => $clase->fecha . ' '. $clase->hora_inicio,
                    'end' => $clase->fecha . ' '. $clase->hora_final,
                    'nombre_curso' => $curso->nombre,
                    'reunion_id' => '',
                    'tipo_evento' => 'curso'
                    );
                    $data = $data . json_encode($temp) . ',';
                }
            }

            $listaReuniones = reunion::where('estudiante_id',$id)->get();
            foreach($listaReuniones as $reunion){
                $temp = array(
                    'id' => $reunion->id,
                    'title' => $reunion->tipo,
                    'clase_id' =>'',
                    'start' => $reunion->start,
                    'end' => $reunion->end,
                    'nombre_curso' => '',
                    'reunion_id' => $reunion->id,
                    'tipo_evento' => 'reunion'
                    );
                    $data = $data . json_encode($temp) . ',';

            }


            $data = substr($data, 0, -1);
                $data = $data . ']';
                echo $data;
            
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
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
    public function show($id)
    {
        //
        try {
            $clase = clase::find($id);
            $aula = aula::find($clase->aula_codigo);
            $detalle = detalle_curso::find($clase->detalle_curso_id);
            $tutor = tutor::find($detalle->tutor_id)->user;
            $curso = curso::find($detalle->curso_codigo);
            $datos = array(
                'codigo_aula' => $aula->codigo,
                'sede_aula' => $aula->sede,
                'nombre_aula' => $aula->nombre,
                'nombre_curso' => $curso -> nombre,
                'nombre_tutor' => $tutor -> name,
                'apellido_tutor' => $tutor -> apellido,
                'hora_inicio' => $clase -> hora_inicio,
                'fecha' => $clase -> fecha
            );
            return response($datos, 200, $datos);
            
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los datos de la clase', 400);
        }
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
        try {
            $datos = array();
            $cont = 0;
            $id = Auth::user()->id;
            $listacursos = lista_curso_estudiante::where('estudiante_id', $id)->get();
            foreach ($listacursos as $lista) {
                $datos[$cont++] = array(
                    'id' => $lista->id
                    );
            }
            return response($datos, 200, $datos);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los cursos', 400);
        }
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
        try {
            $reunion = reunion::find($id);
            $asesor = asesor::find($reunion->asesor_id)->user;
            $datos = array(
                'tipo' => $reunion->tipo,
                'estado_reu' => $reunion->estado,
                'nombre_asesor' => $asesor->name,
                'apellido_asesor' => $asesor->apellido,
                'emailAsesor' => $asesor->email,
                'descripcion' => $reunion->descripcion
            );
            return response($datos, 200, $datos);
            
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los datos de la clase', 400);
        }
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
