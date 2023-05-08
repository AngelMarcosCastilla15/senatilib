<?php
require_once '../models/subcategoria.php';

if (isset($_POST['operacion'])) {

  $subcategoria = new Subcategoria();

  if ($_POST['operacion'] == 'listar') {
    $datosObtenidos = $subcategoria->listar();
    if ($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
