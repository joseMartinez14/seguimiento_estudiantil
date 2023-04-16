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

class SolicitudSeguimientoRegularController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $asesor = asesor::find($id)->user;
        $seguimiento_regular = solicitudes_seguimiento_regular::where('estado', 'Pendiente')->get();
        return view('Asesor/IndexSeguimientoRegular')->with('asesor', $asesor)->with('seguimientos', $seguimiento_regular);
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
        $primer_seguimiento = solicitudes_primer_seguimiento::where('estudiante_id', $id)->orderBy('id', 'desc')->first();
        if ($estudianteDetalle == null) {
            return redirect('/EstudianteDetalle');
        } else {
            if ($primer_seguimiento == null) {
                return redirect('/SolicitudPrimerSeguimiento/create');
            } else {
                return view('Estudiante/CreateSeguimientoRegular')->with('estudiante', $estudiante)->with('estudianteDetalle', $estudianteDetalle);
            }
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
        $s = solicitudes_seguimiento_regular::where('estudiante_id', Auth::user()->id)
            ->where('estado', 'Pendiente')->get();
        //print_r($s);

        if (empty($s[0])) {
            $seguimiento_regular = new solicitudes_seguimiento_regular;
            $seguimiento_regular->estudiante_id = Auth::user()->id;
            $seguimiento_regular->situacion = $request->input('situacion');
            $seguimiento_regular->estado = $request->input('estado');
            $seguimiento_regular->fechaSolicitud = $request->input('fechaSolicitud');
            $seguimiento_regular->save();
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
     * @param  \App\Models\solicitudes_seguimiento_regular  $solicitudes_seguimiento_regular
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = estudiante::where('id', $id)->first();
        $user = User::find($estudiante->id);
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        $primer = solicitudes_seguimiento_regular::where('estudiante_id', $id)->where('estado', 'Pendiente')->first();
        return view('Estudiante/ShowSeguimientoRegular')->with('estudiante', $user)->with('estudianteDetalle', $estudianteDetalle)->with('SeguimientoRegular', $primer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\solicitudes_seguimiento_regular  $solicitudes_seguimiento_regular
     * @return \Illuminate\Http\Response
     */
    public function edit(solicitudes_seguimiento_regular $solicitudes_seguimiento_regular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\solicitudes_seguimiento_regular  $solicitudes_seguimiento_regular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, solicitudes_seguimiento_regular $solicitudes_seguimiento_regular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solicitudes_seguimiento_regular  $solicitudes_seguimiento_regular
     * @return \Illuminate\Http\Response
     */
    public function destroy(solicitudes_seguimiento_regular $solicitudes_seguimiento_regular)
    {
        //
    }
}
