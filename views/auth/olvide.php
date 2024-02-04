<h1 class="titulo">Restablecer Password</h1>
<p class="parrafo">Introdusca su email para restaurar la contraseña</p>

<?php include __DIR__. '/../templates/alertas.php' ;?>
<form method="POST" class="formulario">
    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Ingrese su email">
    </div>

    <input type="submit" class="boton" value="Restablecer">
</form>

<div class="acciones">
    <a href="/crear">Crear nueva cuenta</a>
    <a href="/">Iniciar sesion</a>
    
</div>