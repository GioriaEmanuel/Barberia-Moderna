<?php

namespace Controllers;

use MVC\Router;
use Model\AdminCita;

class CitasController {
    public static function index( Router $router ) {

        session_start();

        isAuth();

        $router->render('citas/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
    public static function panel( Router $router ) {

        session_start();

        isAuth();
        $id=$_SESSION['id'];

        $consulta = "SELECT citas.id, citas.hora,citas.fecha, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuario_id=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citaservicios ";
        $consulta .= " ON citaservicios.citas_id=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citaservicios.servicio_id ";
        $consulta .= " WHERE usuario_id =  '$id' ";
        $consulta .= " ORDER BY fecha DESC ";
       

        $citas = AdminCita::SQL($consulta);
        
       
        $router->render('citas/panel', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'citas'=>$citas
        ],'layoutcitas.php');
    }
    public static function nosotros( Router $router ) {

        session_start();

        isAuth();

        $router->render('citas/nosotros', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ],'layoutcitas.php');
    }



}