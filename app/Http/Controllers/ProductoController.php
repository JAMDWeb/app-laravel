<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends controller{

    public function index(Request $request)
    {
        // modelo tradicional de consulta a DB
            //$productos = DB::select('select * from productos where activo = 1');
            //return view('productos.index',['lista'=>$productos]);

        // Consultas y Filtros en consultas con Eloquent
        // Podemos no poner el 2 parametro, en ese caso toma '=' predefinido
            //$productos = Producto::where('descripcion','LIKE', '%bonafont%')->get();
        // mas de un filtro
            // $productos = Producto::where('existencia','>=', 10)
                // ->where('existencia','<=','50')->get();
        //Otra todas las que coincidan en un rango whereBetween()
            // $productos = Producto::whereBetween('existencia',[0,10])->get();
        //Otra todas las que NO coincidan en un rango whereNotBetween()
            // $productos = Producto::whereNotBetween('existencia',[0,10])->get();
        //Otra alternativa con el and
            //$productos = Producto::where([['existencia','>=', 10],['existencia','<=', 50]])->get();
        //Otra alternativa con el or
            // $productos = Producto::where('existencia','=', 0)
                // ->orWhere('precio','<',50)->get();
        //Otra seleccionar determinado valores
            // $productos = Producto::whereIn('existencia',[0, 2, 6, 1000])->get();
        // Por negacion
            // $productos = Producto::whereNotIn('existencia',[0, 2, 6, 1000])->get();
        // Para trabajar con fechas
        //$productos = Producto::whereDate('created_at','2022-01-07')->get();
        // Para el mese
            // $productos = Producto::whereMonth('created_at','>','01')->get();
        // Para el dia
            // $productos = Producto::whereDay('created_at','=','1')->get();
        // Para el Año
            // $productos = Producto::whereYear('created_at','=','2022')->get();
        // where entre campos(Columnas)
            //$productos = Producto::whereColumn('updated_at','>','created_at')->get();
        // seleccionar campos (columnas) especificos
        // $productos = Producto::select(['id','codigo','descripcion','precio','existencia'])
        // ->where('activo',1)->orderby('descripcion')->limit(5)->get();

        // Validaciones
        // if($request->isMethod('post')){
        //     echo "Metodo GET";
        // }

        // FIltro ordenado
            // $productos = Producto::where('activo',1)
            //             ->orderby('descripcion','asc')->get();// de forma predefinida 'asc'

        $productos = Categoria::find(1)->productos()->get();


        // Consulta que trae todos las columnas y registros
        return view('productos.index',['lista'=>$productos]);
    }

    public function show($nombre)
    {
        return view('productos.show',['producto' =>$nombre]);
    }

    public function create()
    {
        return view('productos.create');

    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
            // unique:productos:el nombre del capo debe ser igual que el de la tabla
            'codigo' => 'required|unique:productos',
            'nombre' => 'required',
            'precio' => 'required'

        ]);

        $producto = new Producto();
        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->existencia = 0;
        $producto->categoria_id = 1;
        $producto->activo = 1;
        $producto->save();

        return "Registro guardado!";

    }

    public function edit($id)
    {
        $producto = Producto::find($id); // where id=$id
        return view('productos.edit',['id'=>$id,'producto'=>$producto]);
    }

    public function update(Request $request,$id)
    {
        $validacion = $request->validate([
            // unique:productos:el nombre del capo debe ser igual que el de la tabla
            'codigo' => 'required|unique:productos',
            'nombre' => 'required',
            'precio' => 'required'

        ]);

        $producto = Producto::find($id);
        $producto->descripcion = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->save();

        return "Regisro modificado!";

    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        echo "Registro $id eliminado" ;
    }
}
