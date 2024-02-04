<?php

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = 'citaservicios';
    protected static $columnasDB = ['id', 'citas_id', 'servicio_id'];

    public $id;
    public $citas_id;
    public $servicio_id;

    public function __construct($args = [])
    {
       $this->id = $args['id'] ?? null;
       $this->citas_id = $args['citas_id'] ?? '';
       $this->servicio_id = $args['servicio_id'] ?? ''; 
    }
}