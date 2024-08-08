<html>
<head>
  <title>Cadastro de Pessoas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>

	<h1 style="text-align:center;" class="my-3">Cadastros de Animais</h1>
	<div class="d-flex justify-content-center my-3">
		<a href="index.php" class="btn btn-primary">Novo Cadastro de um Animal</a>
	</div>

<?php 
include "PDO.php";

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTable();

// var_dump($pdo->selectAsterisco());
echo '<div class="container"><table class="table table-striped text-center align-middle">';
echo '<thead> <tr class="table-dark">
      <th scope="col">id</th>
      <th scope="col">Nome do Animal</th>
      <th scope="col">Descrição do Animal</th>
      <th scope="col">Peso do Animal</th>
      <th scope="col">Vacinas do Animal</th>
      <th scope="col">Categorias</th>
      <th scope="col">Imagem</th>
      <th scope="col" colspan="2">Ações</th>
    </tr>
  </thead>
  <tbody>';

	echo "<tr>
			<td>{$id['id']}</td>
      		<td>{$animais['nome_animais']}</td>
      		<td>{$animais['descricao_animais']}</td>
      		<td>{$animais['peso animais']}</td>
      		<td>{$animais['vacinas_animais']}</td>
      		<td>{$animais['categorias']}</td>
      		<td>{$animais['img']}</td>".
      		'<td>
      			<a href="index.php?id='. $animais['id'] .'">
      				<i class="bi bi-pencil text-primary"></i>
      			</a>
      		</td>
      		<td>
      			<a href="deletar.php?id='. $animais['id'] .'">
      				<i class="bi bi-trash-fill text-danger"></i>
      			</a>
      		</td>
    	</tr>';

	echo '</div></tbody></table>';
?>

</body>
</html>