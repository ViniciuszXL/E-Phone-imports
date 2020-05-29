<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php require_once "../controller/Controller.php"; ?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/media_screen.css">
	<link rel="stylesheet" type="text/css" href="css/font-family.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Painel - Login</title>
</head>

<body>
	<div class="conteudo login">
		<h1>Área de login</h1>
		
		<form method="POST">
			<div class="login-form">
				<div class="login-content-form">
					<span>Nome de usuário</span>
					<input type="text" id="username"/>
				</div>
						
				<div class="login-content-form">
					<span>Senha</span>
					<input type="password" id="senha"/>
				</div>
							
				<button class="login-button" onclick="login();">
					<p id="login-button-content">Entrar<p>
				</button>
			</div>
		</form>
	</div>
</body>

</html>