<?php

namespace App\Http\Controllers;


use App\Models\administrador;
use App\Models\asesor;
use App\Models\User;
use App\Models\tutor;
use App\Http\Controllers\Controller;
use App\Models\super_administrador;
use App\Mail\newusuario;
use App\Models\estudiante;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = super_administrador::find(Auth::user()->id)->user;
        return view('SuperAdministrador.registerUsuarios')->with('usuario', $usuario);
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
        $user = new User;
        $user->id = $request->input('id');
        $user->name = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->usuario = ucwords($user->name) . "". ucwords($user->apellido[0]);
        $user->password = Hash::make($request->input('password'));
        $user->rol = $request->input('rol');
        $user->save();

        $correo = new newusuario($user);
        Mail::to('exitoacademico2021@gmail.com')->send($correo);
        
        if($user->rol == 0){
            $superAdministrador = new super_administrador();
            $superAdministrador->id = $user->id;
            $superAdministrador->save();
        }
        if($user->rol == 1){
            $administrador = new administrador;
            $administrador->id = $user->id;
            $administrador->save();
        }
        if($user->rol == 2){
            $asesor = new asesor;
            $asesor->id = $user->id;
            $asesor->save();
        }
        if($user->rol == 3){
            $tutor = new tutor;
            $tutor->id = $user->id;
            $tutor->save();
        }

 
        return redirect('logged_in');
        /*
        if (isset($_POST["usu"])) {
            echo "LLEGO";
            $array = json_decode($_POST["usu"]);
            echo "LLEGO";
            $usuario = new User;
            $usuario->usuario = $array->user;
            $usuario->rol = $array->rol;
            $usuario->password = $array->contrasena;
            $usuario->id = $array->id;
            $usuario->name = $array->name;
            $usuario->apellido = $array->apellido;
            $usuario->email = $array->email;
            $usuario->save();

            if ($usuario->rol == 0) {
                $superAdministrador = new super_administrador();
                $superAdministrador->id = $usuario->id;
                $superAdministrador->save();
            }
            if ($usuario->rol == 1) {
                $administrador = new administrador;
                $administrador->id = $usuario->id;
                $administrador->save();
            }
            if ($usuario->rol == 2) {
                $asesor = new asesor;
                $asesor->id = $usuario->id;
                $asesor->save();
            }
            if ($usuario->rol == 3) {
                $tutor = new tutor;
                $tutor->id = $usuario->id;
                $tutor->save();
            }


            if ($usuario->id != "") {
                $message = "No Funciono";
                redirect('logged_in');
                return response()->json([
                    'status' => 'Error',
                    'message' => $message,
                ]);
            }
        } else {
            echo "something went wrong";
        }
        return redirect('logged_in');
        */
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
        //
    }
}
