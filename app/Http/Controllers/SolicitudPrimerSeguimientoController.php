<?php

namespace App\Http\Controllers;

use App\Models\solicitudes_seguimiento_regular;
use App\Models\solicitudes_primer_seguimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\asesor;
use App\Models\estudiante_detalle;
use App\Models\estudiante;
use App\Models\disponibilidad_estudiante;
use App\Models\User;

class SolicitudPrimerSeguimientoController extends Controller
{

    public function seguimientosEstudiante()
    {
        $id = Auth::user()->id;
        $estudiante = estudiante::where('id', $id)->first();
        $user = User::find($estudiante->id);
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        $primerosSeguimientos = solicitudes_seguimiento_regular::where('estudiante_id', $id)->where('estado', 'Pendiente')->get();
        $otrosSeguimientos = solicitudes_primer_seguimiento::where('estudiante_id', $id)->where('estado', 'Pendiente')->get();
        if(count($primerosSeguimientos) == 1){
            return view('Estudiante/SolicitudesDeSeguimientos')->with('estudiante', $user)->with('estudianteDetalle', $estudianteDetalle)->with('seguimientos', $primerosSeguimientos);
        }else{
            return view('Estudiante/SolicitudesDeSeguimientos')->with('estudiante', $user)->with('estudianteDetalle', $estudianteDetalle)->with('seguimientos', $otrosSeguimientos);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $asesor = asesor::find($id)->user;
        $primer_seguimiento = solicitudes_primer_seguimiento::where('estado', 'Pendiente')->get();
        return view('Asesor/IndexPrimerSeguimiento')->with('asesor', $asesor)->with('seguimientos', $primer_seguimiento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id)->user;
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        if ($estudianteDetalle == null) {
            return redirect('/EstudianteDetalle');
        } else {
            return view('Estudiante/CreatePrimerSeguimiento')->with('estudiante', $estudiante)->with('estudianteDetalle', $estudianteDetalle);
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
        $s = solicitudes_primer_seguimiento::where('estudiante_id', Auth::user()->id)
            ->where('estado', 'Pendiente')->get();
        if (empty($s[0])) {
            $primer_seguimiento = new solicitudes_primer_seguimiento;
            $primer_seguimiento->estudiante_id = Auth::user()->id;
            $primer_seguimiento->materiaTutoria = $request->input('materia');
            $primer_seguimiento->profesorCurso = $request->input('profesor');
            $primer_seguimiento->creditoCruso = $request->input('creditos');
            $primer_seguimiento->situacion = $request->input('situacion');
            $primer_seguimiento->tipoTutoria = 'Individual';
            $primer_seguimiento->estado = 'Pendiente';
            $primer_seguimiento->save();
            print_r('Exito');
        } else {
            print_r('Error');
        }

        disponibilidad_estudiante::where('estudiante_id', Auth::user()->id)->delete();
        $lista_horarios = json_decode(stripslashes($_POST['horarios']));
        if ($lista_horarios == null) {
        } else {
            foreach ($lista_horarios as $horario) {
                $h = new disponibilidad_estudiante;
                $h->estudiante_id = Auth::user()->id;
                $h->dia = $horario->dia;
                $h->hora = $horario->horaInicio;
                $h->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\solicitud_primer_seguimiento  $solicitud_primer_seguimiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = estudiante::where('id', $id)->first();
        $user = User::find($estudiante->id);
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        $primer = solicitudes_primer_seguimiento::where('estudiante_id', $id)->first();
        return view('Estudiante/ShowPrimerSeguimiento')->with('estudiante', $user)->with('estudianteDetalle', $estudianteDetalle)->with('primerSeguimiento', $primer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\solicitud_primer_seguimiento  $solicitud_primer_seguimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(solicitudes_primer_seguimiento $solicitud_primer_seguimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\solicitud_primer_seguimiento  $solicitud_primer_seguimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, solicitudes_primer_seguimiento $solicitud_primer_seguimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solicitud_primer_seguimiento  $solicitud_primer_seguimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(solicitudes_primer_seguimiento $solicitud_primer_seguimiento)
    {
        //
    }
}
