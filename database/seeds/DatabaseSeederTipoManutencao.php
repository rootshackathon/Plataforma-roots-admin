<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederTipoManutencao extends Seeder
{
    public function run()
    {
        DB::statement(
            'INSERT INTO tipo_manutencao (codigo, sequencia, descricao, status) VALUES (1, 1, "Reparo", 1), (2, 2, "Poda", 1);'
        );

    }
}