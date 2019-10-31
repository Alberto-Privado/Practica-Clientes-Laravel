<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes; //deleted_at

    protected $table = 'cliente';

    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    
    protected $fillable = ['nombre', 'apellidos', 'nacimiento', 'correo', 'telefono', 'clave', 'direccion', 'ip', 'estadoCivil', 'sueldoAnual']; //para definir los campos
    
    protected $attributes = ['estadoCivil' => 'Soltero']; //sólo si hay campos con valores predeterminados
}
