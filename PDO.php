<?php

class usePDO
{

	//Algumas variáveis com dados sobre o Banco. 
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "banco_filis";
	private $instance; // instância de conexão, usada no Singleton

	// método que retorna a instância de conexão
	function getInstance()
	{
		if (empty($instance)) {
			$instance = $this->connection();
		}
		return $instance;
	}

	//método que cria a instância de conexão. 
	private function connection()
	{
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password); //Criando um objeto PDO
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //atribuindo modo de erro do PDO.
			return $conn;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage() . "<br>";
			if (strpos($e->getMessage(), "Unknown database '$dbname'")) {
				echo "Conexão nula, criando o banco pela primeira vez" . "<br>";
				$conn = $this->createDB();
				return $conn;
			} else
				die("Connection failed: " . $e->getMessage() . "<br>");
		}
	}

	//Métodos do CRUD
	function createDB()
	{
		try {
			$cnx = new PDO("mysql:host=$this->servername", $this->username, $this->password);
			$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
			$cnx->exec($sql);
			return $cnx;
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function createTable()
	{
		try {
			$cnx = $this->getInstance();
			$sql = "CREATE TABLE IF NOT EXISTS usuarios (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				nick VARCHAR(150) NOT NULL,
				email VARCHAR(150) UNIQUE NOT NULL,
				senha TEXT NOT NULL
			)";

			$cnx->exec($sql);
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function insertUsuario($nick, $email, $senha)
	{
		try {
			$cnx = $this->getInstance();
			$sql = "INSERT INTO `usuarios`( 
				`nick`,
				`email`, 
				`senha`
			) 
			VALUES (
				\"$nick\",
				\"$email\",
				\"$senha\"
			)";

			$cnx->exec($sql);
			return "sucesso";

		} catch (Exception $e) {
			echo $sql . "<br>" . $e->getMessage();

			if (str_contains($e->getMessage(), "for key 'email'")) {
				return "email";
			} else
				return "erro";
		}
	}

	function selectUser($email)
	{

		$sql = "SELECT * FROM `usuarios` WHERE `email`=\"$email\"";
		try {
			$cnx = $this->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result->fetchAll()[0];
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	

	function selectAllAnimals($categoria)
	{

		$sql = "SELECT * FROM `animais` WHERE `categoria`=\"$categoria\"";
		try {
			$cnx = $this->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result->fetchAll();
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function selectAnimal($id)
	{

		$sql = "SELECT * FROM `animais` WHERE `id`=\"$id\"";
		try {
			$cnx = $this->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result->fetchAll()[0];
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}



	function insertAnimals($nome_animais, $descricao_animais, $peso_animais, $vacinas_animais, $categoria, $img){
		try{
			$cnx = $this->getInstance();
			$sql = "INSERT INTO `animais`(
				`nome_animais`, 
				`descricao_animais`, 
				`peso_animais`, 
				`vacinas_animais`, 
				`categoria`, 
				`img`
			) 
			VALUES (
				\"$nome_animais\",
				\"$descricao_animais\",
				\"$peso_animais\",
				\"$vacinas_animais\",
				\"$categoria\",
				\"$img\"
			)";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	function selectAsterisco(){

		$sql = "SELECT * FROM `animais`";
		try{
			$cnx = $this->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result->fetchAll();
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}

	}

	function delete($id){
		try{
			$cnx = $this->getInstance();
			$sql = "DELETE FROM `animais` WHERE id = $id";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function selectID($id){

		$sql = "SELECT * FROM `animais` WHERE id=$id";
		try{
			$cnx = $this->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result->fetchAll()[0];
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

function updateSemImg($id, $nome_animais, $descricao_animais, $peso_animais, $vacinas_animais, $categoria){
		try{
			$cnx = $this->getInstance();
			$sql = "UPDATE `animais` 
				SET 
					`id`=$id,
					`nome_animais`=\"$nome_animais\",
					`descricao_animais`=\"$descricao_animais\",
					`peso_animais`=\"$peso_animais\",
					`vacinas_animais`=\"$vacinas_animais\",
					`categoria`=\"$categoria\"
					WHERE 
						id=$id";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function update($id, $nome_animais, $descricao_animais, $peso_animais, $vacinas_animais, $categoria, $img){
		try{
			$cnx = $this->getInstance();
			$sql = "UPDATE `animais` 
				SET 
					`id`=$id,
					`nome_animais`=\"$nome_animais\",
					`descricao_animais`=\"$descricao_animais\",
					`peso_animais`=\"$peso_animais\",
					`vacinas_animais`=\"$vacinas_animais\",
					`categoria`=\"$categoria\",
					`img`=\"$img\" 
					WHERE 
						id=$id";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function createTableImg()
    {
        try {
            $cnx = $this->getInstance();
            // CRIA TABELA IMAGEM, TEM APENAS O CAMPO IMG PORQUE É UM TESTE, NO SEU PROJETO DEVE SER COLOCADO ESSE CAMPO(IMG) NA SUA TABELA PESSOAS 
            $sql = "CREATE TABLE IF NOT EXISTS `imagem` (
				 		`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				 		`img` LONGBLOB
				 	)";

            $cnx->exec($sql);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function selectImg()
	{

		$sql = "SELECT * FROM `imagem`";
		try {
			$cnx = $this->getInstance();
			$this->createTableImg();
			$result = $cnx->query($sql);

			return $result->fetchAll();
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}


}




