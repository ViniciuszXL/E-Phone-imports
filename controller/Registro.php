<?php 
header("Content-Type: application/json; charset=utf-8");
require_once "Controller.php";

$jsonReturns = array();
$jsonReturns['resultado'] = 'erro';
if (!isset($_POST['username']) || !isset($_POST['nome']) || !isset($_POST['senha']) || !isset($_POST['email'])) {
	$jsonReturns['mensagem'] = 'Por favor, não deixe o formulário em branco.';
} else {
	$username = $_POST['username'];
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];

	if ($username != "" && $nome != "" && $senha != "" && $email != "") {
		$con = Controller::findSQL();
		$existsEmail = false;
		$existsUsername = false;
		if (!$con) {
			$jsonReturns['mensagem'] = 'Ocorreu um erro na conexão com o Banco de Dados.';
		} else {
			$select = "SELECT * FROM usuarios WHERE email=?";
			$stmt = mysqli_stmt_init($con);
			if (mysqli_stmt_prepare($stmt, $select)) {
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				
				while (mysqli_stmt_fetch($stmt)) {
					if (!$existsEmail)
						$existsEmail = true;
					break;
				}
			} else {
				$jsonReturns['mensagem'] = 'Ocorreu um erro ao completar o cadastramento de seu usuário. [1]';
			}
			
			$select = "SELECT * FROM usuarios WHERE username=?";
			$stmt = mysqli_stmt_init($con);
			if (mysqli_stmt_prepare($stmt, $select)) {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				
				while (mysqli_stmt_fetch($stmt)) {
					if (!$existsUsername)
						$existsUsername = true;
					break;
				}
			} else {
				$jsonReturns['mensagem'] = 'Ocorreu um erro ao completar o cadastramento de seu usuário. [2]';
			}
			
			if ($existsEmail) {
				$jsonReturns['mensagem'] = 'Esse endereço de email já está registrado!';
			} else if ($existsUsername) {
				$jsonReturns['mensagem'] = 'Esse nome de usuário já está registrado!';
			} else {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$passwd_encrypt = password_hash($senha, PASSWORD_DEFAULT);
					$insert = "INSERT INTO usuarios (`username`, `nome`, `senha`, `email`) VALUES (?, ?, ?, ?)";
				
					if ($stmt = mysqli_prepare($con, $insert)) {
						mysqli_stmt_bind_param($stmt, "ssss", $username, $nome, $passwd_encrypt, $email);
					
						if (mysqli_stmt_execute($stmt)) {
							$jsonReturns['resultado'] = 'sucesso';
							$jsonReturns['mensagem'] = 'Cadastro efetuado com sucesso! Redirecionando...';
						} else {
							$jsonReturns['mensagem'] = 'Ocorreu um erro ao completar o cadastramento de seu usuário. [2]';
						}
					} else {
						$jsonReturns['mensagem'] = 'Ocorreu um erro ao completar o cadastramento de seu usuário. [3]';
					}
				} else {
					$jsonReturns['mensagem'] = 'Endereço de email informado é inválido.';
				}

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