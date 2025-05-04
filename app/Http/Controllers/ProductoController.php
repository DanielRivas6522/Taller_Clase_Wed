<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Producto;

class ProductoController extends Controller {
    public function index() {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function show($id) {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function create()
    {
    return view('productos.create');
    }

    public function store(Request $request)
    {
    try {
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock'  => $request->stock
        ]);
        return redirect()->route('productos.index')->with('success','Registrado exitosamente');
        } catch (\Throwable $th) {
        // Se registra en el archivo de texto plano de logs de Laravel: storage\logs\laravel.log
        Log::error('Error al crear producto: ' . $th->getMessage());
        return redirect()->route('productos.index')->with('error', 'Error al registrar');
        }
    }

    public function edit($id)
    {
       $producto = Producto::where('id', $id)->first();
       return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
 {
    try {
        Producto::where('id', $id)->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock'  => $request->stock
        ]);
        return redirect()->route('productos.index')->with('success','Producto actualizado exitosamente');
    } catch (\Throwable $th) {
        // Se registra en el archivo de texto plano de logs de Laravel: storage\logs\laravel.log
        Log::error('Error al actualizar producto: ' . $th->getMessage());
        return redirect()->route('productos.index')->with('error', 'Error al actualizar');
    }
 }

 public function destroy($id)
 {
    Producto::where('id', $id)->delete();
    return redirect()->route('productos.index')->with('success', 'Producto eliminado');
 }
}