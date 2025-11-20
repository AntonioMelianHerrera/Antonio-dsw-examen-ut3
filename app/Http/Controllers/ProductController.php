<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function store(Request $request)
    {
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $categoriaProducto = $request->input('categoria-producto');
        $precioProducto = $request->input('precio-producto');

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precioProducto . "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);

       return redirect()->route('product.create')->with('status', 'Producto guardado correctamente.');
    }

}