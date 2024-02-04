<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController
{
    public static function index(Router $router)
    {
        session_start();

        isAdmin();

        $servicios = Servicio::all();

        $id = $_GET['idEliminar'];
        if($id){
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header('Location: /servicios');
        }
       


        $router->render('admin/servicios', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios,
            'mensaje' => $_GET['mensaje']
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();
        isAdmin();
        $servicio = new Servicio;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            $servicio->validar();
            $alertas = Servicio::getAlertas();

            if (empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios?mensaje=Servicio Creado');
            }
        }

        $router->render('admin/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router)
    {
        session_start();
        isAdmin();

        if (!is_numeric($_GET['id'])) return;

        $servicio = Servicio::find($_GET['id']);



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $servicio->sincronizar($_POST);
            $servicio->validar();
            $alertas = Servicio::getAlertas();

            if (empty($alertas)) {
                $servicio->guardar();
                $alertas['exito'][] = "Servicio Actualizado";

                header('Location: /servicios?mensaje=Servicio Actualizado');
            }
        }

        $router->render('admin/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
}
