<?php
include 'PDO.php';

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTableImg();


//////////////////////////PROCESSAMENTO DA IMAGEM RECEBIDA DO FORMULARIO/////////////////////////////

var_dump($_POST);
echo'<br><br><br>';
var_dump($_FILES);

if (isset($_POST['id'])) {
 if ($_FILES['error'] == 0) {
  $pdo->update($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['peso'], $_POST['vacinas'], $_POST['categorias'], $file_contents);  

} else{
  $pdo->updateSemImg($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['peso'], $_POST['vacinas'], $_POST['categorias']);  

}

} else {

  if (!isset($_FILES['error'])) {
    $img = $_FILES['imagem']['tmp_name'];
    $bin = file_get_contents($img);
    $file_contents = addslashes($bin);
    $pdo->insertAnimals($_POST['nome'], $_POST['descricao'], $_POST['peso'], $_POST['vacinas'], $_POST['categorias'], $file_contents);

  } 
}

  // header('location:index.php');

?>