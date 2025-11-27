<!--Antonio Miguel Melián Herrera-->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    //función store para guardar variables y validaciones
    public function store(Request $request)
    {
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $categoriaProducto = $request->input('categoria-producto');
        $precioProducto = $request->input('precio-producto');
        $unidadesProducto = $request->input('unidades');

    //validaciones
        $request->validate([
            //nombre del producto entre 3 y 100 caracteres
            'nombre-producto' => 'required|string|min:3|max:100',
            //descripción del producto, sin requisitos para validar
            'descripcion-producto' => 'required|string',
            //las categorías pedidas por el ejercicio deben ser electronica y deporte
            'categoria-producto' => 'required|in:Electronica,Deporte',
            //el precio debe ser un número menor a 3000
            'precio-producto' => 'required|integer|max:3000',
            //las unidades son un valor obligatorio, numérico, y de al menos 1
            'unidades' => 'required|integer|min:1',
        ]);

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precioProducto . $unidadesProducto. "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);
        //nos lleva a la vista de product.create con un estatus indicando el número de productos creados
       return redirect()->route('product.create')->with(key:'status', $unidadesProducto);
    }

}