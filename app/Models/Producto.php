<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{ // el modelo ORM eloquent le agrega una s para ubicar el nombre de la tabla
    use HasFactory;

    // usar un nombre de tabla con alguna caracterisca especial en su nombre
    // se puede asignar con:
    protected $tabla = "productos";

    public function categoria()
    {   // Se puede agregar el campo que sea la clave primaria si no es id
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    /*
    // Para la PRIMARY KEY el ORM toma de forma predefinida el campo com nombre id
    // para asignar otro se utilizad:
    protected $primaryKey = "producto_id";
    // usamos las PRIMARY KEY que no sean un numero entero y tampoco sean autoincremental
    public $incrementing = false;
    protected $KeyTipe = 'string';// el tipo
    // en el caso que utilicemos nuetros campos para controlar fechas de creacion y actualizacion
    // deshabilitmos los que utiliza el ORM
    //public $timestamps = false;
    // o en caso de que si las tengamos y querramos utilizar otros nombres
    const CREATED_AT = 'fecha_alta'; // Por ejemplo
    const UPDATE_AT = 'fecha_modifica' // Por ejemplo
    */


}
