<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\estudiante_detalle;
use App\Models\estudiante;
use App\Mail\ContactanosMailable;

class EstudianteDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        if ($estudianteDetalle == NULL) {
            return redirect()->route('EstudianteDetalle.create');
        } else {
            return redirect()->route('EstudianteDetalle.edit', [$id]);
        }
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
        return view('Estudiante/Detalle/RegistroDeEntrada')->with('estudiante', $estudiante);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id)->user;
        
        $estudiante_detalle = new estudiante_detalle;
        $estudiante_detalle->estudiante_id = $request->input('campo-cedula');
        $estudiante_detalle->fecha_nacimiento = $request->input('campo-fecha-nacimiento');
        $estudiante_detalle->edad = $request->input('campo-edad');
        $estudiante_detalle->tel_celular = $request->input('campo-tel-celular');
        $estudiante_detalle->tel_habitacion = $request->input('campo-tel-habitacion');
        $estudiante_detalle->estado_civil = $request->input('campo-estado-civil');
        $estudiante_detalle->hijos = $request->input('campo-hijos');
        $estudiante_detalle->zona_procedencia = $request->input('campo-procedencia');
        $estudiante_detalle->direccion_actual = $request->input('campo-direccion');
        $estudiante_detalle->familiares_convive = $request->input('campo-vivenda');
        $estudiante_detalle->familiares_relacion = $request->input('campo-relacion');
        $estudiante_detalle->familiares_apoyo = $request->input('campo-apoyo');
        $estudiante_detalle->financiamiento = $request->input('campo-financiacion');
        $estudiante_detalle->trabaja = $request->input('campo-trabaja');
        $estudiante_detalle->trabajoLugar = $request->input('campo-trabaja-lugar');
        $estudiante_detalle->trabajoJornada = $request->input('campo-trabaja-jornada');
        $estudiante_detalle->trabajoMotivo = $request->input('campo-trabaja-motivo');
        $estudiante_detalle->antecedenteInstitucion = $request->input('campo-antecedente-institucion');
        $estudiante_detalle->antecedenteModalidadEgreso = $request->input('campo-antecedente-modalidadEgreso');
        $estudiante_detalle->antecedenteAnnoEgreso = $request->input('campo-antecedente-annoEgreso');
        $estudiante_detalle->antecedenteReprobo = $request->input('campo-antecedente-reprobo');
        $estudiante_detalle->antecedenteMateriasDificiles = $request->input('campo-antecedente-materiasDificiles');
        $estudiante_detalle->antecedenteAdecuacion = $request->input('campo-antecedente-adecuacion');
        $estudiante_detalle->antecedenteAdecuacionCuando = $request->input('campo-antecedente-adecuacionCuando');
        $estudiante_detalle->antecedenteAdecuacionTipo = $request->input('campo-antecedente-adecuacionTipo');
        $estudiante_detalle->universidadAdecuacion = $request->input('campo-universidad-adecuacion');
        $estudiante_detalle->universidadCarrera = $request->input('campo-universidad-carrera');
        $estudiante_detalle->universidadCampus = $request->input('campo-universidad-campus');
        $estudiante_detalle->universidadAnnoIngreso = $request->input('campo-universidad-ingreso');
        $estudiante_detalle->universidadNivel = $request->input('campo-universidad-nivel');
        $estudiante_detalle->universidadOpcion = $request->input('campo-universidad-opcion');
        $estudiante_detalle->universidadMotivacion = $request->input('campo-universidad-motivo');
        $estudiante_detalle->universidadSatisfecho = $request->input('campo-universidad-satisfecho');
        $estudiante_detalle->universidadOtraCarrera = $request->input('campo-universidad-otraCarrera');
        $estudiante_detalle->universidadOtraCarreraInstitucion = $request->input('campo-universidad-otraCarrera-institucion');
        $estudiante_detalle->universidadCursosRepetidos = $request->input('campo-universidad-cursosRepetidos');
        $estudiante_detalle->universidadHoraConsulta = $request->input('campo-universidad-consulta');
        $estudiante_detalle->universidadCursosMatriculados = $request->input('campo-universidad-cursosMatriculados');
        $estudiante_detalle->universidadHoraEstudio = $request->input('campo-universidad-horasEstudio');
        $estudiante_detalle->universidadTecnicasEstudio = $request->input('campo-universidad-tecEstudio');
        $estudiante_detalle->universidadPuntualClases = $request->input('campo-universidad-puntualClases');
        $estudiante_detalle->universidadFactoresFavorecen = $request->input('campo-universidad-factoresFavorecen');
        $estudiante_detalle->universidadFactoresObtaculizan = $request->input('campo-universidad-factoresObtaculizan');
        $estudiante_detalle->save();

        
        $correo = new ContactanosMailable($estudiante);
        Mail::to($estudiante->email)->send($correo);
        return redirect('/Estudiante');

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
        $estudiante = estudiante::find($id)->user;
        $estudianteDetalle = estudiante_detalle::where('estudiante_id', $id)->first();
        return view('Estudiante/Detalle/EditEstudianteDetalle')->with('estudiante', $estudiante)->with('estudianteDetalle', $estudianteDetalle);
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
        $id = Auth::user()->id;
        $estudiante = estudiante::find($id)->user;
        
        estudiante_detalle::where('estudiante_id', $id)
            ->update([
                'fecha_nacimiento' => $request->input('campo-fecha-nacimiento'),
                'edad' => $request->input('campo-edad'),
                'tel_celular' => $request->input('campo-tel-celular'),
                'tel_habitacion' => $request->input('campo-tel-habitacion'),
                'estado_civil' => $request->input('campo-estado-civil'),
                'hijos' => $request->input('campo-hijos'),
                'zona_procedencia' => $request->input('campo-procedencia'),
                'direccion_actual' => $request->input('campo-direccion'),
                'familiares_convive' => $request->input('campo-vivenda'),
                'familiares_relacion' => $request->input('campo-relacion'),
                'familiares_apoyo' => $request->input('campo-apoyo'),
                'financiamiento' => $request->input('campo-financiacion'),
                'trabaja' => $request->input('campo-trabaja'),
                'trabajoLugar' => $request->input('campo-trabaja-lugar'),
                'trabajoJornada' => $request->input('campo-trabaja-jornada'),
                'trabajoMotivo' => $request->input('campo-trabaja-motivo'),
                'antecedenteInstitucion' => $request->input('campo-antecedente-institucion'),
                'antecedenteModalidadEgreso' => $request->input('campo-antecedente-modalidadEgreso'),
                'antecedenteAnnoEgreso' => $request->input('campo-antecedente-annoEgreso'),
                'antecedenteReprobo' => $request->input('campo-antecedente-reprobo'),
                'antecedenteMateriasDificiles' => $request->input('campo-antecedente-materiasDificiles'),
                'antecedenteAdecuacion' => $request->input('campo-antecedente-adecuacion'),
                'antecedenteAdecuacionCuando' => $request->input('campo-antecedente-adecuacionCuando'),
                'antecedenteAdecuacionTipo' => $request->input('campo-antecedente-adecuacionTipo'),
                'universidadAdecuacion' => $request->input('campo-universidad-adecuacion'),
                'universidadCarrera' => $request->input('campo-universidad-carrera'),
                'universidadCampus' => $request->input('campo-universidad-campus'),
                'universidadAnnoIngreso' => $request->input('campo-universidad-ingreso'),
                'universidadNivel' => $request->input('campo-universidad-nivel'),
                'universidadOpcion' => $request->input('campo-universidad-opcion'),
                'universidadMotivacion' => $request->input('campo-universidad-motivo'),
                'universidadSatisfecho' => $request->input('campo-universidad-satisfecho'),
                'universidadOtraCarrera' => $request->input('campo-universidad-otraCarrera'),
                'universidadOtraCarreraInstitucion' => $request->input('campo-universidad-otraCarrera-institucion'),
                'universidadCursosRepetidos' => $request->input('campo-universidad-cursosRepetidos'),
                'universidadHoraConsulta' => $request->input('campo-universidad-consulta'),
                'universidadCursosMatriculados' => $request->input('campo-universidad-cursosMatriculados'),
                'universidadHoraEstudio' => $request->input('campo-universidad-horasEstudio'),
                'universidadTecnicasEstudio' => $request->input('campo-universidad-tecEstudio'),
                'universidadPuntualClases' => $request->input('campo-universidad-puntualClases'),
                'universidadFactoresFavorecen' => $request->input('campo-universidad-factoresFavorecen'),
                'universidadFactoresObtaculizan' => $request->input('campo-universidad-factoresObtaculizan')
            ]);
                   
        $correo = new ContactanosMailable($estudiante);
        Mail::to($estudiante->email)->send($correo);
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
}
