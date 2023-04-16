<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\curso;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cursos
        $curso = new curso;
        $curso->codigo = 'MAT001';
        $curso->nombre = 'Matemática General';
        $curso->curso_necesario = null;
        $curso->save();

        $curso = new curso;
        $curso->codigo = 'MAT002';
        $curso->nombre = 'Cálculo 1';
        $curso->curso_necesario = null;
        $curso->save();

        $curso = new curso;
        $curso->codigo = 'MAT030';
        $curso->nombre = 'Matemática para Informática';
        $curso->curso_necesario = null;
        $curso->save();

        $curso = new curso;
        $curso->codigo = 'MAT020';
        $curso->nombre = 'Matemática Financiera';
        $curso->curso_necesario = null;
        $curso->save();

        $curso = new curso;
        $curso->codigo = 'EIF110';
        $curso->nombre = 'Fundamentos de Informática';
        $curso->curso_necesario = null;
        $curso->save();
    }
}
