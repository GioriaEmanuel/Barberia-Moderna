<h1>Servicios</h1>

<?php 
 


 if(!empty($mensaje)){

    echo '<h2 class="exito">' . $mensaje .'</h2>';
    
 }


 ;?>
<div class="listado-servicios">
<?php foreach($servicios as $servicio) {;?>

<div class="servicios">

   <p class="nombreservicio"><?php echo $servicio->nombre ;?></p>
   <p class="precioservicio"><?php echo $servicio->precio ;?></p>
    


      

</div>
<div class="acciones">
        <a href="/servicios?idEliminar=<?php echo $servicio->id;?>">Eliminar</a>
        <a href="/admin/actualizar?id=<?php echo $servicio->id;?>">Actulizar</a>
    </div>
<?php } ;?>
</div>

<a href="/admin" class="boton">Volver</a>