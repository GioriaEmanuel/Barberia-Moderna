<?php 

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController {
    public static function index( Router $router ) {
        session_start();

        isAdmin();

        $fecha = $_GET['fecha'] ?? null;
        if($fecha){
            $fechas = explode('-', $fecha);

            if( !checkdate( $fechas[1], $fechas[2], $fechas[0]) ) {
                header('Location: /404');
    
            }
    

        }
       
        // Consultar la base de datos
        $consulta = "SELECT citas.id,citas.fecha, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuario_id=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citaservicios ";
        $consulta .= " ON citaservicios.citas_id=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citaservicios.servicio_id ";
       
        if($fecha){
            $consulta .= " WHERE fecha =  '$fecha' ";
        }
    
      
        $citas = AdminCita::SQL($consulta);
   


        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas, 
            'fecha' => $fecha
        ]);
    }
}