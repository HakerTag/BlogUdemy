<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
	protected $fillable = ['empresa', 'puesto', 'departamento', 'telefono', 'correo', 'fecha_inicio', 'fecha_termino'];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
