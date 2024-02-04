<h1 class="titulo">Login</h1>
<p class="parrafo">Iniciar Sesion</p>

<?php 

include __DIR__. '/../templates/alertas.php';

;?>
<form method="POST" class="formulario">
    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Ingrese su email">
    </div>
    
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="/crear">Crear nueva cuenta</a>
    <a href="/olvide">Olvide mi Password</a>
</div>