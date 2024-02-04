<h2 class="titulo">Actualizar Servicio</h2>

<?php  include_once __DIR__ . '/../templates/alertas.php' ;?>

<form method="POST" class="formulario">

    <div class="campo">
        <label for="nombre" >Nombre </label>
            <input type="text" id="nombre" name="nombre" value="<?php echo s($servicio->nombre);?>">
    </div>
    <div class="campo">
        <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="<?php echo s($servicio->precio);?>">
            
    </div>
    <input type="submit" value="Actualizar" class="boton">


</form>

<div class="acciones">
    <a href="/admin">Volver</a>
</div>