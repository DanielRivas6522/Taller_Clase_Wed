<!DOCTYPE html>
<html>
<head>
   <title>Editar producto</title>
</head>
<body>
   <h1>Editar producto</h1>
   <form action="{{ route('productos.update', $producto->id) }}" method="POST">
       @csrf
       @method('PUT')
       <span>Nombre:</span>
       <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
       <span>Precio:</span>
       <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}">
       <span>Stock:</span>
       <input type="number" name="stock" value="{{ $producto->stock }}"required>
       <button type="submit">Actualizar</button>
   </form>
</body>
</html>