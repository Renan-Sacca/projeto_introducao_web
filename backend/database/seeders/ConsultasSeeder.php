<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){

            DB::table('Consultas')->insert([
                "paciente_id" => 1,
                "tipo_consulta"  => Str::random(10),
                "data_hora" => "2001-07-07 12:12:12",
            ]        
            );
           
    }
}
}
