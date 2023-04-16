<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\estudiante;
use App\Models\asesor;
use App\Models\estudiante_detalle;
use App\Models\primer_seguimiento;
use App\Models\seguimiento_regular;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;
use App\Models\disponibilidad_estudiante;
use App\Models\solicitudes_primer_seguimiento;
use App\Models\solicitudes_seguimiento_regular;
use Exception;

class EstudianteController extends Controller
{

    public function seguimientos($id)
    {
        //$primer_seguimiento = primer_seguimiento::where('estudiante_id', $id)->whereNotNull('archivo')->get();
        //$otros_seguimientos = seguimiento_regular::where('estudiante_id', $id)->whereNotNull('archivo')->get();
        $primer_seguimiento = primer_seguimiento::where('estudiante_id', $id)->get();
        $otros_seguimientos = seguimiento_regular::where('estudiante_id', $id)->get();
        $estudiante = user::where('id', $id)->first();
        $seguimientos = [];
        $con = 0;
        foreach ($primer_seguimiento as $row) {
            $seguimientos[$con++] = [$estudiante->name, $estudiante->apellido, $row->estudiante_id, $row->fecha, $row->archivo, $row->id];
        }
        foreach ($otros_seguimientos as $row) {
            $seguimientos[$con++] = [$estudiante->name, $estudiante->apellido, $row->estudiante_id, $row->fecha, $row->archivo, $row->id];
        }
        return view('Estudiante/Detalle/seguimientosEstudiante')->with('seguimientos', $seguimientos);
    }

    public function descargar(Request $request)
    {
        if (Storage::disk('public')->exists("$request->id/$request->file")) {
            $path = Storage::disk('public')->path("$request->id/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }

    public function descargarPDF(Request $request)
    {
        if (Storage::disk('public')->exists("$request->id/$request->file")) {
            $path = Storage::disk('public')->path("$request->id/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }

    public function descargarTodos(Request $request)
    {

        $primer_seguimiento = primer_seguimiento::where('estudiante_id', $request->id)->get();
        $otros_seguimientos = seguimiento_regular::where('estudiante_id', $request->id)->get();
        $seguimientos = [];
        $con = 0;
        foreach ($primer_seguimiento as $row) {
            $seguimientos[$con++] = [$row->estudiante_id, $row->fecha, $row->archivo];
        }
        foreach ($otros_seguimientos as $row) {
            $seguimientos[$con++] = [$row->estudiante_id, $row->fecha, $row->archivo];
        }
        $zip = new ZipArchive;

        $fileName = 'seguimientos-' . $request->id . '.zip';

        $path = Storage::disk('public')->path("");

        if ($zip->open($path . $fileName, ZipArchive::CREATE) === TRUE) {
            $files = File::files($path . $request->id);

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download($path . $fileName);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $usuario = estudiante::find(Auth::user()->id);
        switch ($usuario->estado) {
            case 'Activo':
            case 'Finalizado':
                return view('Estudiante/inicioEstudiante')->with('usuario', $usuario->user);
                break;
            case 'Bloqueado':
                Auth::logout();
                return view('Estudiante/Bloqueado');
                break;
            case 'Inactivo':
                break;
        }
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
        $name = $request->file('file')->getClientOriginalName();
        $id = Auth::user()->id;
        $path = $request->file('file')->storeAs('public/archivos', $id);

        $estudiante = new estudiante;

        //$file->name = $name;
        $estudiante->id = $id;
        $estudiante->estado = "Activo";
        $estudiante->archivo = $name;

        $estudiante->save();

        return redirect('Estudiante')->with('status', 'File Has been uploaded successfully in laravel 8');
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
            $opciones = disponibilidad_estudiante::where('estudiante_id', $id)->get();
            $datos = array();
            $cont = 0;

            foreach ($opciones as $row) {
                $datos[$cont++] = array(
                    'dia' => $row->dia,
                    'hora' => $row->hora
                );
            }

            return response($datos, 200, $datos);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los horarios disponibles', 400);
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

        echo "entro aqui";

        /*
        try {
            $opciones = disponibilidad_estudiante::where('estudiante_id', $id)->get();
            $datos = array();
            $cont = 0;
            
        foreach($opciones as $row)
        {
            $datos[$cont++] = array(
            'dia' => $row->dia,
            'hora' => $row->hora
            );
        }
        return response($datos,200,$datos);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return response('Erorr a la hora de cargar los horarios disponibles', 400);
        }
        */
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

        estudiante::where('id', $id)
            ->update([
                'archivo' => $request->file('file')->getClientOriginalName()
            ]);
        $request->file('file')->storeAs('public/' . $id, $id);
        return redirect('/Estudiante');
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

    public function ValidarDetalle()
    {
        $id = Auth::user()->id;
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        if ($estudianteDetalle != NULL) {
            return $estudianteDetalle;
        } else {
            return null;
        }
    }

    public function ValidarPrimerSeguimiento()
    {
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id);
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        if ($estudianteDetalle == NULL) {
            return null;
        }
        $primer_seguimiento = solicitudes_primer_seguimiento::where('estudiante_id', $id)->orderBy('id', 'desc')->first();
        if ($primer_seguimiento != NULL) {
            if ($primer_seguimiento->estado == "Revisado") {
                if ($estudiante->estado == 'Finalizado') {
                    return 1;
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        }else {
            return 4;
        }
    }

    public function ValidarSeguimientoNormal()
    {
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id);
        $primer_seguimiento = solicitudes_primer_seguimiento::where('estudiante_id', $id)->orderBy('id', 'desc')->first();
        $seguimiento_regular = solicitudes_seguimiento_regular::where('estudiante_id', $id)->orderBy('id', 'desc')->first();
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        if ($estudianteDetalle == NULL) {
            return null;
        }
        if ($estudiante->estado == 'Finalizado') {
            return 3;
        }
        if ($primer_seguimiento != NULL && $primer_seguimiento->estado == "Pendiente") {
            return 1;
        }
        if ($seguimiento_regular != NULL && $seguimiento_regular->estado == "Pendiente") {
            return 2;
        }
        return 4;
    }

    public function listar()
    {
        $data = '[';

        foreach (estudiante::all() as $estudiantes) {
            $user = User::find($estudiantes->id);

            $temp = array(
                'id' => $estudiantes->id,
                'nombre' => $user->name,
                'apellido' => $user->apellido
            );
            $data = $data . json_encode($temp) . ',';
        }
        $data = substr($data, 0, -1);
        $data = $data . ']';
        return $data;
    }

    public function BloquearEstudiante($id_estudiante)
    {
        $estudiante = estudiante::find($id_estudiante);
        $estudiante->estado = "Bloqueado";
        $estudiante->save();
        solicitudes_primer_seguimiento::where('estudiante_id', $id_estudiante)->update(['estado' => 'Revisado']);
        return redirect('/SolicitudPrimerSeguimiento');
    }
}
