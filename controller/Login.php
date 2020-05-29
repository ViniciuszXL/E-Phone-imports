<?php 
header("Content-Type: application/json; charset=utf-8");
require_once "Controller.php";

$jsonReturns = array();
$jsonReturns['resultado'] = 'erro';
if (!isset($_POST['email'])) {
	$jsonReturns['mensagem'] = 'Por favor, não deixe o formulário em branco.';
} else {
	$email = $_POST['email'];
	$password = $_POST['senha'];

	if ($password != "" && $email != "") {
		$con = Controller::findSQL();
		$exists = false;
		if (!$con) {
			$jsonReturns['mensagem'] = 'Ocorreu um erro na conexão com o Banco de Dados.';
		} else {
			$select = "SELECT `id`, `senha`, `nome` FROM `usuarios` WHERE `email`=?;";
			$stmt = mysqli_stmt_init($con);
			if (mysqli_stmt_prepare($stmt, $select)) {
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $id, $senha, $nome);
				mysqli_stmt_store_result($stmt);
				
				$num_rows = mysqli_stmt_num_rows($stmt);
				if ($num_rows > 0 && mysqli_stmt_fetch($stmt)) {
					if (password_verify($password, $senha)) {
						$jsonReturns['resultado'] = 'sucesso';
						$jsonReturns['mensagem'] = 'Login efetuado com sucesso! Redirecionando...';
						
						$_SESSION['userId'] = $id;
						$_SESSION['userNome'] = $nome;
						$_SESSION['userEmail'] = $email;
					} else {
						$jsonReturns['mensagem'] = 'A senha informada está incorreta.';
					}
				} else {
					$jsonReturns['mensagem'] = 'Esse usuário não está cadastrado!';	
				}
			}  else {
				$jsonReturns['mensagem'] = 'Ocorreu um erro na obtenção de dados no Banco de dados.';
			}
			
			mysqli_close($con);
		}
	} else {
		$jsonReturns['mensagem'] = 'Por favor, não deixe o formulário em branco.';
	}
	
}

$_POST = array();
echo json_encode($jsonReturns, JSON_UNESCAPED_UNICODE);
?>