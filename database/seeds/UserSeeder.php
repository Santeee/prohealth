<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 3; $i++) { 
            $name = 'nurse'.$i;
            DB::table('users')->insert([
                'name' => $name,
                'email' => $name.'@prohealth.covid19',
                'password' => Hash::make('123'),
                'matricula' => Str::random(10),
                'matricula' => '8:30 to 12:00',
                'especialidad_id' => 1,
                'hospital_id' => 1
            ]);
        }

        for ($i=1; $i <= 2; $i++) { 
            $name = 'doctor'.$i;
            DB::table('users')->insert([
                'name' => $name,
                'email' => $name.'@prohealth.covid19',
                'password' => Hash::make('123'),
                'matricula' => Str::random(10),
                'matricula' => '8:30 to 12:00',
                'especialidad_id' => 2,
                'hospital_id' => 1
            ]);
        }
    }
}

