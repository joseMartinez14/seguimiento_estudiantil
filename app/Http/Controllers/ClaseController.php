<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\detalle_curso;
use App\Models\clase;
use App\Models\curso;
use Illuminate\Http\Request;
use Exception;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $detallesCursos = detalle_curso::where('tutor_id', $id)->get();
        //echo $detallesCursos . "<br><br>";
        $data = array();
        foreach ($detallesCursos as $row) {
            //echo "ROW = " . $row . "<br>";
            $clases = clase::where('detalle_curso_id', $row->id)->where('fecha','<=', date("Y-m-d"))->orderBy('fecha','DESC')->get();
            //echo "CLASES = " . $clases . "<br>";
            foreach ($clases as $clase) {
                $detalle_curso = detalle_curso::find($clase->detalle_curso_id);
                $data[] = array(
                    'codigo_curso' => curso::find($detalle_curso->curso_codigo)->codigo,
                    'nombre_curso'   => curso::find($detalle_curso->curso_codigo)->nombre,
                    'aula_codigo'  => $clase["aula_codigo"],
                    'hora_inicio' => $clase["hora_inicio"],
                    'fecha'  => $clase["fecha"]
                );
            }

            /*   foreach($clases as $clase){
                $data[] = array(    
                    'codigo_curso' => $row->curso_codigo,
                    'nombre_curso'   => $curso->nombre,
                    'aula_codigo'  => $clase["aula_codigo"],
                    'hora_inicio' => $clase["hora_inicio"],
                    'fecha'  => $clase["fecha"]
                    );
            }*/
        }
        return view("Tutor/reporte_clases")->with("data",$data);

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
        try {
            $clase = clase::find($id);
            $clase -> delete();
            return response("Eliminado correctament",200);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de eliminar la clase', 400);
        }
        
    }
}
