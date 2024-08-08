<?php
include 'PDO.php';
session_start();
$login = $_POST['email'];
$senha = hash('sha256', $_POST['senha']);

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTable();

$usuarios = $pdo->selectuser($login);

if ($login == $usuarios['email'] and $senha == $usuarios['senha']) {
	$_SESSION['email'] = $login;
	$_SESSION['nick'] = $usuarios['nick'];
	header('location:../php/inicio.php'); //Modificar para enviar para a lista de animais! 
} else {
	unset($_SESSION['email']);
	unset($_SESSION['nick']);
	session_unset();
	header('location:login.php?erro');
}
