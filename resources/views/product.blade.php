<!--Antonio Miguel Melián Herrera-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
</head>
<body>
    <h1>Registrar Nuevo Producto</h1>

     <!--Mensaje utilizando el status para indicar el número de productos creados-->
     @if (session('status'))
    <div>
        <p style="color: green;">Se registraron: {{session('status')}} productos</p>
    </div>
    @endif

    <!--Formulario protegido con @csrf con los apartados pedidos-->
    <form action="/product" method="POST">
        @csrf
        <label for="nombre-producto">Nombre del Producto:</label><br>
        <input type="text" id="nombre-producto" name="nombre-producto" required><br><br>

        <label for="descripcion-producto">Descripción del Producto:</label><br>
        <textarea id="descripcion-producto" name="descripcion-producto" required></textarea><br><br>

        <label for="precio-producto">Precio del Producto:</label><br>
        <input type="number" id="precio-producto" name="precio-producto" step="0.01" required><br><br>

        <label for="unidades">Unidades del producto:</label><br>
        <input type="number" id="unidades" name="unidades" step="0.01" required><br><br>

        <label for="categoria-producto">Categoría del Producto:</label><br>
        <select id="categoria-producto" name="categoria-producto" required>
            <option value="">Selecciona una categoría</option>
            <option value="Electronica">Electronica</option>
            <option value="Deporte">Deporte</option>
        </select><br><br>
        <input type="submit" value="Dar de alta el producto">
    </form>
</body>
</html>