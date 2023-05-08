<?php
require "Conexion.php";

class Editorial extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listar()
  {
    try {
      $consulta = $this->conexion->prepare("CALL listarEditoriales()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

}