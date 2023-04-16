<?php

namespace Database\Seeders;

use App\Models\asesor;
use App\Models\estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\super_administrador;
use App\Models\User;
use App\Models\tutor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Usuario
        $user = new User;
        $user->id = 123;
        $user->name = 'admin';
        $user->apellido = 'admin';
        $user->email = 'admin@hotmail.com';
        $user->usuario = ucwords('admin');
        $user->password = Hash::make('123456789');
        $user->rol = 0;
        $user->save();
        $super_administrador = new super_administrador();
        $super_administrador->id = $user->id;
        $super_administrador->save();

        //Asesores
        $user = new User;
        $user->id = 112760481;
        $user->name = 'Priscilla';
        $user->apellido = 'Venegas Herrera';
        $user->email = 'priscilla.venegas.herrera@una.cr';
        $user->usuario = ucwords('PriscillaVenegasHerrera');
        $user->password = Hash::make('Exito2021');
        $user->rol = 2;
        $user->save();
        $asesor = new asesor;
        $asesor->id = $user->id;
        $asesor->save();


        $user = new User;
        $user->id = 502830045;
        $user->name = 'Kattia';
        $user->apellido = 'Salas Perez';
        $user->email = 'kattia.salas.perez@una.cr';
        $user->usuario = ucwords('KattiaSalasPerez');
        $user->password = Hash::make('Exito2021');
        $user->rol = 2;
        $user->save();
        $asesor = new asesor;
        $asesor->id = $user->id;
        $asesor->save();

        //Asesores
        $user = new User;
        $user->id = 109850886;
        $user->name = 'Laura';
        $user->apellido = 'Ramirez Chavarria';
        $user->email = 'laura.ramirez.chavarria@una.cr';
        $user->usuario = ucwords('LauraRamirezChavarria');
        $user->password = Hash::make('Exito2021');
        $user->rol = 2;
        $user->save();
        $asesor = new asesor;
        $asesor->id = $user->id;
        $asesor->save();

        $user = new User;
        $user->id = 108230121;
        $user->name = 'Bernarda';
        $user->apellido = 'Rivas Solano';
        $user->email = 'bernarda.rivas.solano@una.cr';
        $user->usuario = ucwords('BernardaRivasSolano');
        $user->password = Hash::make('Exito2021');
        $user->rol = 2;
        $user->save();
        $asesor = new asesor;
        $asesor->id = $user->id;
        $asesor->save();

        $user = new User;
        $user->id = 401520495;
        $user->name = 'Ana';
        $user->apellido = 'Gonzalez Vargas';
        $user->email = 'ana.gonzalez.vargas@una.cr';
        $user->usuario = ucwords('AnaGonzalesVargas');
        $user->password = Hash::make('Exito2021');
        $user->rol = 2;
        $user->save();
        $asesor = new asesor;
        $asesor->id = $user->id;
        $asesor->save();

        //Tutores
        $user = new User;
        $user->id = 401910902;
        $user->name = 'Jacqueline';
        $user->apellido = 'Gonzalez Espinoza';
        $user->email = 'jacqueline.gonzalez.espinoza@una.cr';
        $user->usuario = ucwords('JacquelineGonzalezEspinoza');
        $user->password = Hash::make('Exito2021');
        $user->rol = 3;
        $user->save();
        $tutor = new tutor;
        $tutor->id = $user->id;
        $tutor->save();

        $user = new User;
        $user->id = 401900984;
        $user->name = 'Cristina';
        $user->apellido = 'Arrieta Araya';
        $user->email = 'cristina.arrieta.araya@una.ac.cr';
        $user->usuario = ucwords('CristinaArrietaAraya');
        $user->password = Hash::make('Exito2021');
        $user->rol = 3;
        $user->save();
        $tutor = new tutor;
        $tutor->id = $user->id;
        $tutor->save();

        //Estudiantes
        $user = new User;
        $user->id = 207600154;
        $user->name = 'David';
        $user->apellido = 'Cordero';
        $user->email = 'david.cordero.jimenez@est.una.ac.cr';
        $user->usuario = ucwords('DavidCordero');
        $user->password = Hash::make('123456789');
        $user->rol = 4;
        $user->save();
        $estudiante = new estudiante();
        $estudiante->id = $user->id;
        $estudiante->estado = 'Activo';
        $estudiante->save();

        $user = new User;
        $user->id = 207770701;
        $user->name = 'Mario';
        $user->apellido = 'Siu';
        $user->email = 'mario.siu.araya@est.una.ac.cr';
        $user->usuario = ucwords('MarioSiu');
        $user->password = Hash::make('123456789');
        $user->rol = 4;
        $user->save();
        $estudiante = new estudiante;
        $estudiante->id = $user->id;
        $estudiante->estado = 'Activo';
        $estudiante->save();
    }
}
