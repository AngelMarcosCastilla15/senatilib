<?php
require_once '../models/editorial.model.php';

if (isset($_POST['operacion'])){

  $editorial = new Editorial();

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $editorial->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

}