<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederUsuario extends Seeder
{
    public function run()
    {
        DB::statement('
            INSERT INTO usuario 
            (codigo, sequencia, nome, email, password, status, created_at, updated_at, codigo_pessoa, codigo_tipo_usuario) 
            VALUES 
            ("1", "1", "Roots", "admin@roots.com", "'.bcrypt("123456").'", 1, null, null, "1", "1"),
            ("2", "2", "Bob", "bob@roots.com", "'.bcrypt("123456").'", 1, null, null, "2", "2"),
            ("3", "3", "João", "joao@roots.com", "'.bcrypt("123456").'", 1, null, null, "3", "3")'
        );

    }
}