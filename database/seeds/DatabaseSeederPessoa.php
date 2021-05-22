<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederPessoa extends Seeder
{
    public function run()
    {
        DB::statement('
            INSERT INTO pessoa 
            (codigo, sequencia, nome, cpf, telefone, status, created_at, updated_at) 
            VALUES 
            ("1", "1", "Roots", "00000000000", "63999999999", 1, null, null),
            ("2", "2", "Bob", "00000000001", "63999999991", 1, null, null),
            ("3", "3", "João", "00000000003", "63999999992", 1, null, null)'
        );

    }
}