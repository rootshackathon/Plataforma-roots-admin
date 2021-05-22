<?php

namespace App\Models;

use App\Helpers\Util;
use Illuminate\Database\Eloquent\Model; 

class TipoSituacaoArvore extends Model
{
    protected $table = "tipo_situacao_arvore";
    protected $fillable = ["codigo", "sequencia", "descricao", "status", "created_at", "updated_at"];
    
    public static function Listar($filtro)
    {
        $listaResultado = TipoSituacaoArvore::orderBy('descricao', 'ASC');

        if ($filtro) 
        {
            $listaResultado = $listaResultado->where('descricao', 'like', '%' . $filtro . '%');
        }

        $listaResultado = $listaResultado->paginate(Util::$quantidadePaginacao);

        return $listaResultado;
    }

}
