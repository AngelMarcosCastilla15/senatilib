<?php

require_once '../models/categoria.model.php';

if (isset($_POST['operacion'])){

  $categoria = new Categoria();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $categoria->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

}