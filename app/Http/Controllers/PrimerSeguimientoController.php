<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobanteReunionEmail;
use App\Models\curso;
use App\Models\detalle_curso;
use Illuminate\Http\Request;
use App\Models\reunion;
use App\Models\primer_seguimiento;
use Illuminate\Support\Facades\Auth;
use App\Models\lista_curso_estudiante;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\user;
use Illuminate\Support\Facades\Storage;


class PrimerSeguimientoController extends Controller
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
        $primer_seguimiento = new primer_seguimiento;
        $primer_seguimiento->estudiante_id = $request->input('campo-estudiante');
        $primer_seguimiento->aprovacion = $request->input('campo-aprovada');
        $primer_seguimiento->observaciones = $request->input('campo-observaciones');
        if ($request->file('archivo') != null) {
            // Guarda el archivo
            $name = $request->file('archivo')->getClientOriginalName();
            $primer_seguimiento->archivo = $name;
            $request->file('archivo')->storeAs('public/' . $primer_seguimiento->estudiante_id, $name);
        }
        $primer_seguimiento->fecha = $request->input('campo-fecha');
        if ($primer_seguimiento->aprovacion == "Aprobada") {
            $primer_seguimiento->detalle_curso_id = $request->input('campo-curso');

            //asigna al estudiante al curso
            $Curso_Estudiante = new lista_curso_estudiante;
            $Curso_Estudiante->detalle_curso_id = $request->input('campo-curso');
            $Curso_Estudiante->estudiante_id = $request->input('campo-estudiante');
            $Curso_Estudiante->save();

            $primer_seguimiento->save();
            $curso = detalle_curso::find($primer_seguimiento->detalle_curso_id);
            $tutor = user::find($curso->tutor_id);
            $estudiante = user::find($request->input('campo-estudiante'));
            $data = [
                'id' =>  $primer_seguimiento->id,
                'estudiante_id' =>  $request->input('campo-estudiante'),
                'estudiante_nombre' =>  $estudiante->name . " " . $estudiante->apellido,
                'estudiante_correo' =>  $estudiante->email,
                'aprovacion' =>  $request->input('campo-aprovada'),
                'detalle_curso_codigo' =>  $curso->curso_codigo,
                'detalle_curso_nombre' => curso::find($curso->curso_codigo)->nombre,
                'nombre_tutor' =>  $tutor->name . " " . $tutor->apellido,
                'observaciones' =>  $request->input('campo-observaciones'),
                'fecha' =>  $request->input('campo-fecha')
            ];
        } else {
            $primer_seguimiento->save();
            $estudiante = user::find($request->input('campo-estudiante'));
            $data = [
                'id' =>  $primer_seguimiento->id,
                'estudiante_id' =>  $request->input('campo-estudiante'),
                'estudiante_nombre' =>  $estudiante->name . " " . $estudiante->apellido,
                'estudiante_correo' =>  $estudiante->email,
                'aprovacion' =>  $request->input('campo-aprovada'),
                'detalle_curso_codigo' =>  $primer_seguimiento->detalle_curso_id,
                'observaciones' =>  $request->input('campo-observaciones'),
                'fecha' =>  $request->input('campo-fecha')
            ];
        }
        Storage::makeDirectory('public/' . $primer_seguimiento->estudiante_id);
        $pdf = PDF::loadView('PDF/primerSeguimiento', $data)
            ->save(storage_path('app/public/' . $primer_seguimiento->estudiante_id) . '/' . 'primerSeguimiento-' . $primer_seguimiento->estudiante_id . '-' . $primer_seguimiento->id . '.pdf');

        reunion::where('id', $request->input('campo-id'))->update([
            'estado' => 'Realizada',
            'backgroundColor' => '#FF0000'
        ]);

        $reunion = reunion::find($request->input('campo-id'));
        //Mandar Email

        $correo = new ComprobanteReunionEmail($estudiante, $reunion, $primer_seguimiento->id, 'primerSeguimiento-');
        Mail::to($estudiante->email)->send($correo);


        return redirect('/Calendario');
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
