<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class TipoUsuario extends Model
{
    protected $table = "tipo_usuario";
    protected $fillable = ["codigo", "sequencia", "descricao", "status", "created_at", "updated_at"];
    
}
