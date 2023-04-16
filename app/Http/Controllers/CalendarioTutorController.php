<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\tutor;
use App\Models\detalle_curso;
use App\Models\curso;
use App\Models\clase;

class CalendarioTutorController extends Controller
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
        $usuario = tutor::find($id)->user;
        return view('Tutor/calendarioTutor')->with('usuario',$usuario);
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
    public function show($id)
    {
        //
        $data = '[';
        $detalles_cursos = detalle_curso::where('tutor_id', Auth::user()->id)->get();
        foreach ($detalles_cursos as $detalle) {
            $clasesPorDetalle = clase::where('detalle_curso_id',$detalle->id)->get();
            $curso = curso::find($detalle->curso_codigo);
            foreach ($clasesPorDetalle as $clase) {
                $temp = array(
                    'id' => $clase->id,
                    'title' => $curso->nombre,
                    'tutor_id' => $detalle->tutor_id,
                    'clase_id' => $clase->id,
                    'curso_codigo' => $detalle->curso_codigo,
                    'curso_id' => $detalle->id,
                    'start' => $clase->fecha . ' '. $clase->hora_inicio,
                    'end' => $clase->fecha . ' '. $clase->hora_final,
                    'nombre_curso' => $curso->nombre
                );
                $data = $data . json_encode($temp) . ',';
            }
        }
        $data = substr($data, 0, -1);
        $data = $data . ']';
        echo $data;
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
