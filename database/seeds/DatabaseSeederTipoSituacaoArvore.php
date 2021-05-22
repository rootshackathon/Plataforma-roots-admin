<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeederTipoSituacaoArvore extends Seeder
{
    public function run()
    {
        DB::statement('
            INSERT INTO tipo_situacao_arvore (codigo, sequencia, descricao, status) 
            VALUES 
            (1, 1, "Está próximo de postes", 1),
            (2, 2, "Está próximo de fiações", 1),
            (3, 3, "Está próximo de muros", 1),
            (4, 4, "Está próximo de placas de trânsito", 1),
            (5, 5, "Está próximo de calçadas", 1);
        '
        );

    }
}