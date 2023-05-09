<?php
require "Conexion.php";

class Material extends Conexion{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function registrar($datos = []){
    try{
      $consulta = $this->conexion->prepare("CALL  spu_registrar_material(?,?,?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos["subcategoria"],
          $datos["editorial"],
          $datos["titulo"],
          $datos["sinopsis"],
          $datos["versionmat"],
          $datos["autor"],
          $datos["cantidadpaginas"],
          $datos["apublicacion"],
          $datos["caratula"],
          $datos["materialpdf"]
        )
      );
      return true;
    }catch(Exception $e){
      return false;
      //TODO
    }
  }
  public function listar()
  {
    try {
      $consulta = $this->conexion->prepare("CALL listarMateriales()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

}