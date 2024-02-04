<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<h1 class="titul">Restablecer Password</h1>

<?php if (!$error) {; ?>
    <p class="parrafo">Intoduce tu nuevo password</p>

    <form method="POST" class="formulario">
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="password">
        </div>

        <input type="submit" value="Restablecer" class="boton">
    </form>
<?php } else {; ?>

    <div class="acciones">
        <a href="/olvide">Volver</a>
    </div>
<?php }; ?>