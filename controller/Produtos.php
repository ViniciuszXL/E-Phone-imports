<?php 
require_once "Controller.php";

class Produtos {
	
	public static function getProductsByName() {
		$returns = array();
		$returns['resultado'] = 'erro';
		$returns['mensagem'] = 'Foram encontrados 0 resultados para sua pesquisa.';
		$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);
		if (!isset($_GET['pesquisa']))
			return json_encode($returns, JSON_UNESCAPED_UNICODE);
		
		$returnId = 0;
		$select = "SELECT `id`, `marca`, `nome`, `versao`, `preco`, `imagem` FROM `produtos` LIKE `".$_GET['pesquisa']."%`;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_execute($stmt);
					
			mysqli_stmt_bind_result($stmt, $id, $marca, $nome, $versao, $preco, $imagem);
			mysqli_stmt_store_result($stmt);
			while (mysqli_stmt_fetch($stmt)) {
				$returns[$returnId]['id'] = $id;
				$returns[$returnId]['marca'] = $marca;
				$returns[$returnId]['nome'] = $nome;
				$returns[$returnId]['versao'] = $versao;
				$returns[$returnId]['preco'] = $preco;
				$returns[$returnId]['imagem'] = $imagem;
				$returnId = $returnId + 1;
			}
			
			mysqli_close($connect);
		}
		
		$returns['mensagem'] = 'Pesquisa "'.$_GET['pesquisa'].'" retornou '.$returnId.' resultados.';
		$_POST = array();
		return json_encode($returns, JSON_UNESCAPED_UNICODE);
	}
	
	public static function getProducts($limit) {
		$returns = array();
		$returns['resultado'] = 'erro';
		$returns['mensagem'] = 'Não foi encontrado produtos cadastrados na loja.';
		$returns['limite'] = $limit;
		$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);

		$select = "SELECT `id`, `marca`, `nome`, `versao`, `preco`, `imagem` FROM `produtos`;";
		if ($limit)
			$select = "SELECT `id`, `marca`, `nome`, `versao`, `preco`, `imagem` FROM `produtos` LIMIT 12;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_execute($stmt);
					
			mysqli_stmt_bind_result($stmt, $id, $marca, $nome, $versao, $preco, $imagem);
			mysqli_stmt_store_result($stmt);
			$num_rows = mysqli_num_rows($stmt);
			$returns['quantidade'] = $num_rows;
			$returnId = 1;
			while (mysqli_stmt_fetch($stmt)) {
				$returns[$returnId]['id'] = $id;
				$returns[$returnId]['marca'] = $marca;
				$returns[$returnId]['nome'] = $nome;
				$returns[$returnId]['versao'] = $versao;
				$returns[$returnId]['preco'] = $preco;
				$returns[$returnId]['imagem'] = $imagem;
				$returnId = $returnId + 1;
			}
			
			mysqli_close($connect);
		}

		$_POST = array();
		return json_encode($returns, JSON_UNESCAPED_UNICODE);
	}
	
}


?>