<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    
    <h1>Productos Disponibles</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <th>{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        
                        <a href="{{ route('productos.edit', $producto->id) }}">
                            <button type="button">Editar</button>
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="
                                return confirm('¿Estás seguro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('productos.create') }}">
        <button type="button">Crear</button>
    </a>
    
</body>
</html>