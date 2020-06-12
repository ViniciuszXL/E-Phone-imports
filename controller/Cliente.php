<?php 

require_once "Controller.php";

class Cliente {

	public static function getPurchasedItems() {
		$returns = array();
		$returns['resultado'] = "erro";
		$returns['value'] = "Você ainda não efetuou nenhuma compra em nosso site.";
		$connect = Controller::findSQL();
		if (!$connect)
			return json_encode($returns, JSON_UNESCAPED_UNICODE);
		
		$select = "SELECT `produtoId`, `quantidade`, `total`, `situacao` FROM `compras` WHERE `userId`=?;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_bind_param($stmt, "s", $_SESSION['userId']);
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_bind_result($stmt, $produtoId, $quantidade, $total, $situacao);
			mysqli_stmt_store_result($stmt);
			$num_rows = mysqli_stmt_num_rows($stmt);
			if ($num_rows > 0) {
				$id = 1;
				$returns['resultado'] = "sucesso";
				$returns['value'] = "Foram encontrados ".$num_rows." compras para este usuário.";
				$returns['compras'] = $num_rows;
				
				while (mysqli_stmt_fetch($stmt)) {
					$returns[$id]['produtoId'] = $produtoId;
					$returns[$id]['produtoName'] = Controller::findValueInArray(
													Controller::findValueInDatabase('nome', 'produtos', 'id', $produtoId));
					$returns[$id]['produtoImage'] = Controller::findValueInArray(
													Controller::findValueInDatabase('imagem', 'produtos', 'id', $produtoId));
					$returns[$id]['quantidade'] = $quantidade;
					$returns[$id]['total'] = $total;
					$returns[$id]['situacao'] = $situacao;
					$id = $id + 1;
				}
			}
		}
		
		mysqli_close($connect);
		return json_encode($returns, JSON_UNESCAPED_UNICODE);
	}

	public static function deleteAccount() {
		$connect = Controller::findSQL();
		if (!$connect)
			return false;
		
		$select = "DELETE FROM `usuarios` WHERE `id`=?;";
		$stmt = mysqli_stmt_init($connect);
		if (mysqli_stmt_prepare($stmt, $select)) {
			mysqli_stmt_bind_param($stmt, "s", $_SESSION['userId']);
			mysqli_stmt_execute($stmt);
			$_SESSION = array();
		}
		
		mysqli_close($connect);
		return true;
	}

}

?>
