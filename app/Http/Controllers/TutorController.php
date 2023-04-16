<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\asesor;
use App\Models\tutor;
use App\Models\detalle_curso;
use App\Models\curso;
use App\Models\user;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $usuario = tutor::find($id)->user;
        return view('Tutor/inicioTutor')->with('usuario',$usuario);
    }

    public function registroEstudiante()
    {
            /*
            $id = Auth::user()->id;
            $detalle_curso = detalle_curso::where('tutor_id', $id)->get();
            return view('Tutor/listaEstudiantes')->with('data',$detalle_curso);
            */
            $id = Auth::user()->id;
            $detalle_curso = detalle_curso::where('tutor_id', $id)->get();
            $datos = array();
            $cont = 0;
            foreach($detalle_curso as $row)
            {
                $curso = curso::where('codigo', $row->curso_codigo)->first();
        
                $datos[$cont++] = array(
                'id_detalle' => $row["id"],
                'curso'   => $curso["nombre"],
                'periodo'   => $row["periodo"],
                'num_periodo' => $row["num_periodo"],
                'hora_inicio'   => $row["hora_inicio"],
                'dia'   => $row["dia"]
                );
            }
            $data = json_encode($datos);
            return view('Tutor/listaEstudiantes')->with('data', $data);

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
        $tutores = user::where('rol', 3)->get();        
        return view('SuperAdministrador/Tutores')->with('tutores',$tutores);
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
        $tutor = tutor::findOrFail($id);
        $tutor->delete();
        $user = user::findOrFail($id);
        $user->delete();
        return $this->show();
    }
}
