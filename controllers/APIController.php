<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;


class APIController {

    public static function index() {
   
        $servicios = Servicio::all();
        echo json_encode($servicios,JSON_UNESCAPED_UNICODE);
    }

    public static function guardar() {
       
        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        
        $id = $resultado['id'];

        // Almacena la Cita y el Servicio

        // Almacena los Servicios con el ID de la Cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio) {
            $args = [
                'citas_id' => $id,
                'servicio_id' => $idServicio
            ];
            $citaservicio = new CitaServicio($args);
            $citaservicio->guardar();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}

?>