
<?php
require_once '../models/materiales.model.php';
require_once "../utils/file.php";

if(isset($_POST['operacion'])){

  $material = new Material();
  $fileHelper = new FileHelper();

  if ($_POST['operacion'] == 'registrar'){

    $urlPdf = $fileHelper->uploadFile("materialpdf", '.pdf');
    $urlPortada = $fileHelper->uploadFile("caratula", '.jpg');
    
    $datos=[
      "subcategoria"=> $_POST["subcategoria"],
      "editorial"=> $_POST["editorial"],
      "titulo"=> $_POST["titulo"],
      "sinopsis"=> $_POST["sinopsis"],
      "versionmat"=> $_POST["version"],
      "autor"=>$_POST["autor"],
      "cantidadpaginas"=>$_POST["cantidadpaginas"],
      "apublicacion"=>$_POST["apublicacion"],
      "caratula"=> $urlPortada,
      "materialpdf"=>$urlPdf 
    ];

    $data = [
      "status"=> false,
    ];

    $data["status"] = $material->registrar($datos);

    echo json_encode($data);
    
  }

  if ($_POST['operacion'] == 'listar'){
    $datosObtenidos = $material->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }
 

}


