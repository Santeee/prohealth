<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitales')->insert([
            'codigo_postal' => '9410',
            'nombre' => 'Hospital Regional de Ushuaia',
            'username'=> 'hruadmin',
            'direccion' => 'Leopoldo Lugones N...',
        ]);
        DB::table('hospitales')->insert([
            'codigo_postal' => '4400',
            'nombre' => 'Hospital Regional de Salta',
            'username'=> 'hraadmin',
            'direccion' => 'Av. Jujuy N...',
        ]);
    }
}
