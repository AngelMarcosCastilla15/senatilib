<?php
require 'Conexion.php';
class Subcategoria extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listar()
  {
    try {
      $consulta = $this->conexion->prepare("CALL listarsubcategoria()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

}