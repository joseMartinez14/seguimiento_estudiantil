<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\detalle_curso;
use App\Models\curso;
use App\Models\lista_curso_estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\estudiante;
use Exception;

class ListaCursoEstudianteController extends Controller
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
        $detalle_curso = detalle_curso::where('tutor_id', $id)->get();
        $datos = array();
        $cont = 0;
        foreach ($detalle_curso as $row) {
            $curso = curso::where('codigo', $row->curso_codigo)->first();

            $datos[$cont++] = array(
                'id_detalle' => $row["id"],
                'curso'   => $curso["nombre"],
                'periodo'   => $row["periodo"],
                'hora_inicio'   => $row["hora_inicio"],
                'dia'   => $row["dia"]
            );
        }
        $data = json_encode($datos);
        return view('Tutor/listaCursosEstudiantes')->with('data', $data);
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
        try {
            $curso_estudiante = lista_curso_estudiante::where('detalle_curso_id', $id)->get();
            $datos = array();
            $cont = 0;

            foreach ($curso_estudiante as $row) {
                $estudiante = User::find($row["estudiante_id"]);
                $datos[$cont++] = array(
                    'nombre' => $estudiante->name,
                    'apellido' => $estudiante->apellido,
                    'cedula' => $estudiante->id,
                    'correo'   => $estudiante->email
                );
                //echo $estudiante;
            }
            return response($datos, 200, $datos);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los estudiantes', 400);
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

    public function listar($id)
    {
        $data = '[';
        $lista_estudiante = lista_curso_estudiante::where('detalle_curso_id', $id)->get();
        foreach ($lista_estudiante as $row) {
            $estudiante = estudiante::find($row->estudiante_id)->user;
            $detalle_curso = detalle_curso::find($row->detalle_curso_id);
            $temp = array(
                'id' => $row->id,
                'detalle_curso_id' => $row->detalle_curso_id,
                'curso_codigo' => $detalle_curso->curso_codigo,
                'estudiante_id' => $row->estudiante_id,
                'nombre' => $estudiante->name,
                'apellido' => $estudiante->apellido,
                'correo' => $estudiante->email,
            );
            $data = $data . json_encode($temp) . ',';
        }
        $data = substr($data, 0, -1);
        $data = $data . ']';
        return $data;
    }
}
