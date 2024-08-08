<html>


<head>
	<title>Cadastro de Animais</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>

	<?php

	include "PDO.php";

	$pdo = new usePDO();
	$pdo->createDB();
	$pdo->createTable();

	$resultado = NULL;

	if(isset($_GET['id'])){
		$resultado = $pdo->selectID($_GET['id']);
	} 
	?>

	<div class="container">

		<?php 
		if($resultado != NULL){
			echo '<form enctype="multipart/form-data" action="processaAnimais.php" method="POST" class="col-6 p-4 needs-validation" novalidate>';
			echo '<input type="hidden" name="id" value="'.$resultado['id'].'">';
		}
		else{
			echo '<form enctype="multipart/form-data" action="processaAnimais.php" method="POST" class="col-6 p-4 needs-validation" novalidate>';
		}

		?>



		<h1 class="mb-3">Cadastro de Animais</h1>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">
			<i class="bi bi-chat-square-heart"></i>
			</span>
			<?php 
			if($resultado != NULL){
				echo '<input type="text" class="form-control" placeholder="Nome do Animal" aria-label="nome_animal" aria-describedby="basic-addon1" name="nome" required 
				value="'.$resultado['nome_animais'].'">';
			}
			else{
				echo '<input type="text" class="form-control" placeholder="Nome do Animal " aria-label="nome_animal" aria-describedby="basic-addon1" name="nome" required>';
			}
			?>

			<div class="invalid-feedback">
				Insira um nome do animal!
			</div>
		</div>

		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">
			<i class="bi bi-chat-left-text"></i>
			</span>
			<?php 
			if($resultado != NULL){
				echo '<input id="text" type="text" class="form-control" placeholder="Descricao do Animal" aria-label="descricao_animais" aria-describedby="basic-addon1" name="descricao" required
				value="'.$resultado['descricao_animais'].'">';
			}
			else{
				echo '<input id="datePickerId" type="text" class="form-control" placeholder="Descricao do Animal" aria-label="descricao_animais" aria-describedby="basic-addon1" name="descricao" required>';
			}
			?>

			<div class="invalid-feedback">
				Preencha este campo
			</div>
		</div>
		<div class="row">
			<div class="mb-3 col-6">
				<?php 
				if($resultado != NULL){
					echo '<input type="text" class="form-control" placeholder="Peso do Animal" aria-label="peso_animais" aria-describedby="basic-addon1" name="peso" required
					value="'.$resultado['peso_animais'].'">';
				}
				else{
					echo '<input type="text" class="form-control" placeholder="Peso do Animal" aria-label="peso_animais" aria-describedby="basic-addon1" name="peso" required>';
				}
				?>

				<div class="invalid-feedback">
					Preencha este campo
				</div>
			</div>
			<div class="ms-auto mb-3 col-5">
				<?php 
				if($resultado != NULL){
					echo '<input type="text" class="form-control" placeholder="Vacinas do animal" aria-label="vacinas_animais" aria-describedby="basic-addon1" name="vacinas" required
					value="'.$resultado['vacinas_animais'].'">';
				}
				else{
					echo '<input type="text" class="form-control" placeholder="Vacinas do Animal" aria-label="vacinas_animais" aria-describedby="basic-addon1" name="vacinas" required>';
				}
				?>

				<div class="invalid-feedback">
					Preencha este campo
				</div>
			</div>
		</div>
		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">
			<i class="bi bi-clipboard-heart"></i>
			</span>
			<?php 
			if($resultado != NULL){
				echo '<input type="text" class="form-control" placeholder="Categoria " aria-label="categoria" aria-describedby="basic-addon1" name="categorias" required
				value="'.$resultado['categoria'].'">';
			}
			else{
				echo '<input type="text" class="form-control" placeholder="Categoria" aria-label="categoria" aria-describedby="basic-addon1" name="categorias" required>';
			}
			?>

			<div class="invalid-feedback">
				Preencha este campo
			</div>
		</div>

		<div class="input-group mb-auto">
			<div class="mb-3">
				<input class="form-control" type="file" id="formFile" name="imagem">
			</div>
		</div>
		<input type="submit" value="Salvar" class="btn btn-success">
	</form>
</div>

<script>
      //Validação do formulário com bootstrap
	(function () {
		'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
		Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')
			}, false)
		})
	})()

      //deixar a data máxima para o dia atual
	datePickerId.max = new Date().toISOString().split("T")[0];
</script>

</body>
</html>