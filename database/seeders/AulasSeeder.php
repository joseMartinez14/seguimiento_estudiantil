<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\aula;

class AulasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aula = new aula;
        $aula->codigo = 'MS TEAMS';
        $aula->sede = 'Microsoft Teams';
        $aula->nombre = null;
        $aula->save();

        $aula = new aula;
        $aula->codigo = 'AU001';
        $aula->sede = 'Central Omar Dengo';
        $aula->nombre = null;
        $aula->save();

        $aula = new aula;
        $aula->codigo = 'AU002';
        $aula->sede = 'Central Omar Dengo';
        $aula->nombre = null;
        $aula->save();

        $aula = new aula;
        $aula->codigo = 'AU003';
        $aula->sede = 'Benjamín Núñez';
        $aula->nombre = null;
        $aula->save();

        $aula = new aula;
        $aula->codigo = 'AU004';
        $aula->sede = 'Benjamín Núñez';
        $aula->nombre = null;
        $aula->save();
    }
}
