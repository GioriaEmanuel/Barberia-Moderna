<div class="botoncerrar">
    <a href="/logout" class="cerrarsesion">Cerrar Session</a> 
</div>

<h3 class="titulo-cita" data-nombre="<?php echo $nombre; ?>">Hola <?php echo $nombre; ?></h3>
<p class="parrafo">Crea una nueva cita</p>

<div id="app">

    <nav class="navegacion">
        <button class="tabs seleccionado" type="button" data-paso="1">Servicios</button>
        <button class="tabs" type="button" data-paso="2">Informacion Cita</button>
        <button class="tabs" type="button" data-paso="3">Resumen</button>
    </nav>


    <div class="seccion mostrar" id="paso-1" >
        <h2>Servicios</h2>
        <p class="parrafo">Elige tus Servicios a continuacion</p>
        <div class="listado-servicios"></div>
    </div>

    <div class="seccion" id="paso-2">
        <h2>Tus datos y cita</h2>
        <p class="parrafo">Coloca tus Datos y fecha de tu cita</p>

        <form class="formulario">
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
            </div>
            <div class="campo">
                <label for="hora">Hora</label>
                <input type="time" id="hora"  min="09:00" max="18:00">
            </div>
            <input type="hidden" data-id="<?php echo $id;?>">
        </form>
    </div>

    <div class="seccion" id="paso-3">
        <h2>Resumen</h2>
        <p class="parrafo">Verifica que la informacion se correcta</p>
    </div>

    <div class="paginacion">
        <button id="anterior" type="button" class="boton">&laquo;Anterior</button>
        <button id="siguiente" type="button" class="boton"> Siguiente&raquo;</button>
    </div>
</div>

<div class="acciones"><a href="/panel">Volver</a></div>

<?php $script = "
<script src='https:cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src ='/build/js/app.js'></script>" 
;?>