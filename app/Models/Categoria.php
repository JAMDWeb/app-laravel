<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{ // el modelo ORM eloquent le agrega una s para ubicar el nombre de la tabla

    // usar un nombre de tabla con alguna caracterisca especial en su nombre
    // se puede asignar con:
    protected $tabla = "categorias";

    public function productos(){
        return $this->hasMany(Producto::class,'categoria_id','id');
    }
}
