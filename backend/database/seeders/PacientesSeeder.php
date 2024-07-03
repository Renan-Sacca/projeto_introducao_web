<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pacientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){

        
        DB::table('pacientes')->insert([
            "nome" => Str::random(10),
            "data_nascimento" => "2001-07-07",
            "endereco"  => Str::random(10),
            "telefone" => Str::random(10),
            "email" => Str::random(10)
        ]        
        );
        
    }}
}
