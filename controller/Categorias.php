<?php 
require_once "Controller.php";

class Categorias {
	
	public static function getCategories() {
		$returns = array();
		$returns['resultado'] = 'erro';
		$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);

		$select = "SELECT `id`, `nome` FROM `categorias`;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $id, $nome);
			mysqli_stmt_store_result($stmt);
			
			$returnId = 0;
			while (mysqli_stmt_fetch($stmt)) {
				$returns[$returnId]['id'] = $id;
				$returns[$returnId]['nome'] = $nome;
				$returns[$returnId]['quantidade'] = Categorias::getProductsInCategory($id);
				$returnId = $returnId + 1;
			}
			
			$returns['quantidade'] = $returnId;
			mysqli_close($connect);
		}

		$_POST = array();
		return json_encode($returns, JSON_UNESCAPED_UNICODE);
	}
	
	public static function getProductsInCategory($id) {
		$num_rows = 0;
				$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);

		$select = "SELECT `productId` FROM `produtos` WHERE `categoriaId`=?;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_bind_param($select, "s", $id);
			mysqli_stmt_execute($stmt);
					
			mysqli_stmt_bind_result($stmt, $productId);
			mysqli_stmt_store_result($stmt);
			$num_rows = mysqli_num_rows($stmt);
			mysqli_close($connect);
		}
		
		return $num_rows;
	}
	
}


?>