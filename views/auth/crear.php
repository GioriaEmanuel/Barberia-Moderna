
<h1 class="titulo">Crear Cuenta</h1>
<p class="parrafo">Llena el siguiente formulario</p>

<?php

    include_once __DIR__ . '/../templates/alertas.php';
    

  ?> 
  


<form method="POST" class="formulario">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?php echo s($usuario->nombre); ?>">
    </div>
    <div class="campo">
        <label for="apellido">Apelldio</label>
        <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" value="<?php echo s($usuario->apellido); ?>" >
    </div>
    <div class="campo">
        <label for="apelldio">Telefono</label>
        <input type="tel" name="telefono" id="telefono" placeholder="Ingrese su telefono" value="<?php echo s($usuario->telefono); ?>">
    </div>
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Ingrese su email" value="<?php echo s($usuario->email); ?>">
    </div>
    <div class="campo">
        <label for="contraseña">Password</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su password">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">

</form>

<div class="acciones">
    <a href="/">Volver</a>
</div>