<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "codigo", "sequencia", "nome", "email", "password", "status", "codigo_pessoa", "codigo_tipo_usuario"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "password", "remember_token",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    protected $primaryKey = 'codigo';

    protected $table = "usuario";

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, "codigo", "codigo_pessoa");
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, "codigo_tipo_usuario", "codigo");
    }
}
