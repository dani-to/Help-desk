<?php
include_once "conexion.php";
class TICKET extends CONEXION{
    private $folio;
    private $id_empleado;
    private $id_cliente;
    private $id_incidente;
    private $id_venta;
    private $descripcion;
    private $imagen;
  
    /**
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }
    /**
     * @param mixed $folio
     */
    public function setFolio($folio): void
    {
        $this->folio = $folio;
    }

    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }
    public function setIdEmpleado($id_empleado): void
    {
        $this->id_empleado = $id_empleado;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getIdIncidente()
    {
        return $this->id_incidente;
    }
    public function setIdIncidente($id_incidente): void
    {
        $this->id_incidente = $id_incidente;
    }

    public function getIdVenta()
    {
        return $this->id_venta;
    }
    public function setIdVenta($id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    public function queryconsultaTicket(){
        $query="SELECT `folio`, `fecha_creacion`, `id_empleado`, `id_cliente`, `id_incidente`, `id_venta`, `descripcion`, `imagen`, `fecha_edicion`, `fecha_solucion` FROM `tickets`";
        $this->connect();
        $resultado = $this->getData($query);
        $this->close();
        return $resultado;
    }

    public function queryInsertTicket(){
        $query="INSERT into `tickets`(`folio`, `fecha_creacion`, `id_empleado`, `id_cliente`, `id_incidente`, `id_venta`, `descripcion`, `imagen`, `fecha_edicion`) 
        VALUES ('".$this->getFolio()."', current_timestamp(), '".$this->getIdEmpleado()."', '".$this->getIdCliente()."', '".$this->getIdIncidente()."', '".$this->getIdVenta()."', '".$this->getDescripcion()."', '".$this->getImagen()."', current_timestamp())";
        $this->connect();
        $resultado= $this->executeInstruction($query);
        $this->close();
        return $resultado;
    }

    public function queryUpdateTicket(){
        $query="UPDATE `tickets` SET `id_empleado` = '".$this->getIdEmpleado()."', `fecha_edicion` = current_timestamp(), `fecha_solucion` = current_timestamp() WHERE `tickets`.`id_asignatura` = '".$this->getIdAsignatura()."'";
        //retrun $query;
        $this->connect();
        $resultado= $this->executeInstruction($query);
        $this->close();
        return $resultado;
    }
}