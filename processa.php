<?php

include "PDO.php";

// var_dump($_POST);

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTable();
$senha = hash('sha256', $_POST['senha']);
// echo $senha;
$result = $pdo->insertusuario($_POST['nick'], $_POST['email'], $senha);

//TODO Inserir pessoa

if ($result == "sucesso") {
	header('location:login.php?sucesso');
} else if ($result == "email") {
	header('location:cadastro.php?erro=Email Duplicado');
} else {
	header('location:cadastro.php?erro=Problemas ao salvar cadastro no servidor!');
}

?>