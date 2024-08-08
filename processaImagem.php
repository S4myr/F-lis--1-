<?php
include 'PDO.php';

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTableImg();


//////////////////////////PROCESSAMENTO DA IMAGEM RECEBIDA DO FORMULARIO/////////////////////////////

var_dump($_POST);

  $img = $_FILES['imagem']['tmp_name'];
  $bin = file_get_contents($img);
  $file_contents = addslashes($bin);
  $pdo->insertImg($file_contents);
  header('location:index.php');

?>