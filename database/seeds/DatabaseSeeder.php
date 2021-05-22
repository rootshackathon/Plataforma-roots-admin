<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                DatabaseSeederPessoa::class,
                DatabaseSeederTipoUsuario::class,
                DatabaseSeederUsuario::class,
                DatabaseSeederRegiao::class,
                DatabaseSeederEspecie::class,
                DatabaseSeederTipoManutencao::class,
                DatabaseSeederTipoSituacaoArvore::class,
            ]
        );
    }
}
