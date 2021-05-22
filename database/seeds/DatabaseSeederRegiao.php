<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederRegiao extends Seeder
{
    public function run()
    {
        DB::statement('
            INSERT INTO regiao (codigo, sequencia, descricao, latitude, longitude, distancia_maxima_raio, ponto_referencia, status) 
            VALUES ("1", "1", "Outros", "0", "0", "0", "Sul", "1");'
        );

    }
}