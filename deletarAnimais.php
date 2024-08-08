<?php 
include "PDO.php";

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTable();

$pdo->delete($_GET['id']);

?>

<html>
<head>
	<title>Cadastro de Pessoas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
	<div class="container my-3">
		<div class="alert alert-success" role="alert">
			Cadastro ID <?php echo $_GET['id'] ?> deletado com sucesso!
		</div>

		<a href="leitura.php" class="btn btn-success">Voltar</a>
	</div>
</body>
</html>