<?php


use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudianteDetalleController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdministradorController;
use App\Http\Controllers\DetalleCursoController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ListaCursoEstudianteController;
use App\Http\Controllers\HorarioAsesorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\SolicitudPrimerSeguimientoController;
use App\Http\Controllers\SolicitudSeguimientoRegularController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\PrimerSeguimientoController;
use App\Http\Controllers\SeguimientoRegularController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\DisponibilidadEstudianteController;
use App\Http\Controllers\CalendarioTutorController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CalendarioEstudianteController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logged_in', function () {
    if (Auth::user() == null) {
        return view('Welcome.welcome');
    } else {
        $rol = Auth::user()->rol;
        $usuario = Auth::user();
        if ($rol == 0) { //Administrador
            return view('SuperAdministrador/inicioSuperAdministrador')->with('usuario', $usuario);
        }
        if ($rol == 1) { //Administrador
            return view('Administrador/inicioAdministrador')->with('usuario', $usuario);
        }
        if ($rol == 2) { //Asesor
            return view('Asesor/inicioAsesor')->with('usuario', $usuario);
        }
        if ($rol == 3) { //Tutor
            return view('Tutor/inicioTutor')->with('usuario', $usuario);
        }
        if ($rol == 4) { //Estudiante
            return redirect('Estudiante');
        }
    }
});
Route::get('/', function () {
    return redirect('/logged_in');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/horarioAsesor', [HorarioAsesorController::class, 'tablaHorarios']);

    Route::get('/Estudiante/Listar', [EstudianteController::class, 'listar']);
    Route::get('/Asesor/Listar', [AsesorController::class, 'listar']);

    Route::get('/Estudiante/ValidarDetalle', [EstudianteController::class, 'ValidarDetalle'])->name('Estudiante.ValidarDetalle');
    Route::get('/Estudiante/ValidarPrimerSeguimiento', [EstudianteController::class, 'ValidarPrimerSeguimiento']);
    Route::get('/Estudiante/ValidarSeguimientoNormal', [EstudianteController::class, 'ValidarSeguimientoNormal']);

    Route::get('/ListaCursoEstudiante/{id}', [ListaCursoEstudianteController::class, 'listar']);

    Route::resources([
        '/SuperAdministrador' => SuperAdministradorController::class,
        '/Asesor' => AsesorController::class,
        '/Estudiante' => EstudianteController::class,
        '/Tutor' => TutorController::class,
        '/Administrador' => AdministradorController::class,
        '/User' => UserController::class,
        '/EstudianteDetalle' => EstudianteDetalleController::class,
        '/Tutorias-estudiantes' => ListaCursoEstudianteController::class,
        '/CursosDetallados' => DetalleCursoController::class,
        '/AgendarSeguimientos' => SeguimientoController::class,
        '/Clases' => ClaseController::class,
        '/horario-citas' => HorarioAsesorController::class,
        '/Cursos' => CursoController::class,
        '/SolicitudPrimerSeguimiento' => SolicitudPrimerSeguimientoController::class,
        '/SolicitudSeguimientoRegular' => SolicitudSeguimientoRegularController::class,
        '/PrimerSeguimiento' => PrimerSeguimientoController::class,
        '/SeguimientoRegular' => SeguimientoRegularController::class,
        '/Calendario' => CalendarioController::class,
        '/Aula' => AulaController::class,
        '/DisponibilidadEstudiante' => DisponibilidadEstudianteController::class,
        '/calendarioTutor' => CalendarioTutorController::class,
        '/calendarioEstudiante' => CalendarioEstudianteController::class,
        '/Asistencia' => AsistenciaController::class
    ]);


    Route::get('/Tutorias-estudiantes/{id}', [ListaCursoEstudianteController::class, 'show'])->middleware('auth');
    Route::get('/CalendarizarPrimerSeguimiento/{id}/edit', [CalendarioController::class, 'editPrimerSeguimiento'])->name('CalendarizarPrimerSeguimiento.edit');
    Route::get('/CalendarizarSeguimientoRegular/{id}/edit', [CalendarioController::class, 'editSeguimientoRegular'])->name('CalendarizarSeguimientoRegular.edit');
    Route::get('/BloquearEstudiante/{id}', [EstudianteController::class, 'BloquearEstudiante'])->name('BloquearEstudiante.block');
    // Solicitudes seguimiento estudiante
    Route::get('/SolicitudSeguimientosEstudiante', [SolicitudPrimerSeguimientoController::class, 'seguimientosEstudiante']);


    // Eliminar Asesores
    Route::get('/Asesores', [AsesorController::class, 'show']);
    Route::get('/EliminarAsesor/{id}/destroy', [AsesorController::class, 'destroy'])->name('EliminarAsesor.destroy');
    Route::get('/Tutores', [TutorController::class, 'show']);
    Route::get('/EliminarTutor/{id}/destroy', [TutorController::class, 'destroy'])->name('EliminarTutor.destroy');

    // For PDF's

    Route::get('/Seguimientos/{id}', [EstudianteController::class, 'seguimientos']);
    Route::get('/Descargar', [EstudianteController::class, 'descargar']);
    Route::get('/DescargarPDF', [EstudianteController::class, 'descargarPDF']);
    Route::get('/DescargarTodos', [EstudianteController::class, 'descargarTodos']);
});
//Route::post('store', [EstudianteController::class, 'update']);
