<?php 

foreach($alertas as $tipo => $mensajes){

        foreach($mensajes as $mensaje){?>

            <p class="<?php echo $tipo;?>"><?php echo $mensaje ;?></p>
   

        <?php } ;?>

<?php } ;?>