<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederTipoUsuario extends Seeder
{
    public function run()
    {
        DB::statement('
            INSERT INTO tipo_usuario 
            (codigo, sequencia, descricao, status, created_at, updated_at) 
            VALUES 
            ("1", "1", "Sistema", 1, null, null),
            ("2", "2", "Funcionário Publico", 1, null, null),
            ("3", "3", "Cidadão", 1, null, null),
            ("4", "4", "Outros", 1, null, null)'
        );

    }
}