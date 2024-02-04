<h2 class="titulo">Crear Nuevo Servicio</h2>

<?php  include_once __DIR__ . '/../templates/alertas.php'; ?>

<form method="POST" class="formulario">

    <div class="campo">
        <label for="nombre" >Nombre </label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del Servicio" value="<?php echo $servicio->nombre;?>">
    </div>
    <div class="campo">
        <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Servicio" value="<?php echo $servicio->precio;?>">
    </div>
    <input type="submit" value="Crear" class="boton">


</form>

<div class="acciones">
    <a href="/admin">Volver</a>
</div>