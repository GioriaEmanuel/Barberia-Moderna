<div class="botoncerrar"><a href="/logout" class="cerrarsesion">Cerrar Session</a></div>






<div class="contenedor-app-panel">


    <div class="app-panel">
        <h3>Acciones</h3>
        <div class="botones-panel">

            <a href="#citas"><button type="button" class="boton">Mis Citas</button> </a>
            <a href="/cita"><button type="button" class="boton">Nueva Cita</button></a>
            <a href="/nosotros"><button type="button" class="boton">Nosotros</button></a>


        </div>


    </div>

    <div class="contenedor-imagenes-panel">
        <h3>Nuestros servicios</h3>
        <div class="imagenes-panel">
            <div class="imagen-panel1">Barberia</div>
            <div class="imagen-panel2">Corte y Arte</div>
            <div class="imagen-panel3">Color</div>

        </div>
    </div>


</div>
<h3>Tus citas</h3>
<div class="contenedor-calendario">

    <div class="citas" id="citas">
        <?php if (empty($citas))

            echo "<h2>No tienes citas</h2>"; ?>

        <?php foreach ($citas as $key => $cita) { ?>

            <?php if ($idcita != $cita->id) {
                $total = 0;
                $idcita = 0;

            ?>



                <p class="citaid">Cita N° <?php echo $cita->id; ?></p>
                <p class="cliente" style="border-top: 1px solid white; padding-top:2rem;">Cliente : <?php echo $cita->cliente; ?></p>
                <p class="telefono">Telefono : <?php echo $cita->telefono; ?></p>
                <p class="email">Email : <?php echo $cita->email; ?></p>
                <p class="fecha">Fecha : <?php echo $cita->fecha; ?></p>
                <p class="hora">Hora : <?php echo $cita->hora; ?></p>


                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-down-line" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round" id="<?php echo $cita->id; ?>">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 12h3.586a1 1 0 0 1 .707 1.707l-6.586 6.586a1 1 0 0 1 -1.414 0l-6.586 -6.586a1 1 0 0 1 .707 -1.707h3.586v-6h6v6z" />
                    <path d="M15 3h-6" />
                </svg>

            <?php $idcita = $cita->id;
            } //fin del if ;
            ?>
            <div class="detalles-cita " data-cita="<?php echo $cita->id; ?>">


                <p>Servicio: <span><?php echo $cita->servicio; ?></span></p>
                <p>Coste: <span><?php echo $cita->precio; ?></span></p>
                <?php $total += $cita->precio; ?>

                <!-- si el id de la cita actual es diferente al id de la cita que viene queire decir que es la ultima vuelta del bucle for -->
                <?php if ($cita->id != $citas[$key + 1]->id) {; ?>

                    <p class="total">Total a pagar: $ <span><?php echo $total; ?></span></p>
                <?php }; ?>

            </div>

        <?php }; ?>


    </div>

    <div class="calendario">


    </div>
</div>





<?php $script = "
<script src ='/build/js/panel.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>"; ?>