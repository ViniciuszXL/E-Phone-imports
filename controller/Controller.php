<?php

SESSION_START();
require_once "Cliente.php";

class Controller {
	
	public static function findSQL() {
		return mysqli_connect("localhost", "root", "", "ephone-imports");
	}

	public static function createTables($connect) {
		$USERS_TABLE = "CREATE TABLE IF NOT EXISTS usuarios (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(16) NOT NULL,
			senha TEXT NOT NULL,
			email VARCHAR(50) NOT NULL,
			nome TEXT NOT NULL
		)";
		if (!mysqli_query($connect, $USERS_TABLE))
			die ("Ocorreu um erro: ".mysqli_error($connect));
		
		$FUNCIONARIOS_TABLE = "CREATE TABLE IF NOT EXISTS funcionarios (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(16) NOT NULL,
			senha TEXT NOT NULL,
			nome TEXT NOT NULL
		)";
		if (!mysqli_query($connect, $FUNCIONARIOS_TABLE))
			die ("Ocorreu um erro: ".mysqli_error($connect));
		
		$CATEGORIA_TABLE = "CREATE TABLE IF NOT EXISTS categorias (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			nome VARCHAR(16) NOT NULL
		)";
		if (!mysqli_query($connect, $CATEGORIA_TABLE))
			die ("Ocorreu um erro: ".mysqli_error($connect));
		
		$PRODUTO_TABLE = "CREATE TABLE IF NOT EXISTS produtos (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			nome TEXT NOT NULL,
			preco INT NOT NULL,
			estoque INT NOT NULL,
			descricao TEXT NOT NULL,
			caracteristicas TEXT NOT NULL,
			imagem TEXT NOT NULL
		)";
		if (!mysqli_query($connect, $PRODUTO_TABLE))
			die ("Ocorreu um erro: ".mysqli_error($connect));
		
		$CARRINHO_TABLE = "CREATE TABLE IF NOT EXISTS carrinho (
			userId INT NOT NULL,
			produtoId INT NOT NULL,
			FOREIGN KEY (userId) REFERENCES usuarios(id),
			FOREIGN KEY (produtoId) REFERENCES produtos(id)
		)";
		if (!mysqli_query($connect, $CARRINHO_TABLE))
			die ("Ocorreu um erro: ".mysqli_error($connect));
		
		$compras_categoria = "CREATE TABLE IF NOT EXISTS compras_categoria (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			situacao TEXT NOT NULL,
			situacaoName TEXT NOT NULL
		)";
		if (!mysqli_query($connect, $compras_categoria))
			die("Error: " . mysqli_error($connect));
		
		$compras = "CREATE TABLE IF NOT EXISTS compras (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			userId INT NOT NULL,
			produtoId INT NOT NULL,
			quantidade DOUBLE NOT NULL,
			total DOUBLE NOT NULL,
			situacao INT NOT NULL,
			metodo VARCHAR(30) NOT NULL,
			data TEXT NOT NULL,
			FOREIGN KEY (userId) REFERENCES usuarios(id),
			FOREIGN KEY (produtoId) REFERENCES produtos(id),
			FOREIGN KEY (situacao) REFERENCES compras_categoria(id)
		)";
		if (!mysqli_query($connect, $compras))
			die("Error: " . mysqli_error($connect));
	}
	
	public static function findValueInArray($array) {
		$decoded = json_decode($array, true);
		return $decoded['value'];
	}
	
	public static function formatMoney($value) {
		setlocale(LC_MONETARY, "pt-br");
		return money_format("%i", $value);
	}

	public static function findValueInDatabase($value, $table, $argument, $id) {
		$returns = array();
		$returns['resultado'] = "erro";
		$returns['value'] = "Não encontrado";
		$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);
		
		$select = "SELECT ".$value." FROM ".$table." WHERE ".$argument."=?";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_bind_param($stmt, "s", $id);
			mysqli_stmt_execute($stmt);
				
			mysqli_stmt_bind_result($stmt, $name);
			mysqli_stmt_store_result($stmt);
			if (mysqli_stmt_num_rows($stmt) > 0 && mysqli_stmt_fetch($stmt)){
				$returns['resultado'] = "sucesso";
				$returns['value'] = $name;
			}
			
			mysqli_stmt_close($stmt);
		}
		
		mysqli_close($connect);
		return json_encode($returns, JSON_UNESCAPED_UNICODE);
	}
	
	public static function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
	
	public static function sessionStarted() {
		return isset($_SESSION['userId']) ? $_SESSION['userId'] != "" ? true : false : false;
	}
}

?>