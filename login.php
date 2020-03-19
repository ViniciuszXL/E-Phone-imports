<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <title>E-Phone Imports - Login</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/media_screen.css">
	
    <link rel="stylesheet" type="text/css" href="css/font-family.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		
		<div class="conteudo logo-imagem">
			<img src="img/logo.png">
		</div>
		
		<div class="conteudo site-section">
			<div class="conteudo registro">
				<h1>Registrar</h1>
				
				<form method="POST" id="registro_form">
					<div class="registro-content-form">
						<span>E-mail</span>
						<input type="email" id="email"/>
					</div>
						
					<button class="registro-button" onclick="registroUser();">
						<p id="registro-button-content">Continuar<p>
					</button>
				</form>
			</div>
			
			<div class="conteudo login">
				<h1>Entrar</h1>
				
				<form method="POST" id="login_form">
					<div class="login-form">
						<div class="login-content-form">
							<span>E-mail</span>
							<input type="email" id="email"/>
						</div>
						
						<div class="login-content-form">
							<span>Senha</span>
							<input type="password" id="senha"/>
						</div>
						<a href="#">Esqueceu sua senha?</a>
							
						<button class="login-button" onclick="loginUser();">
							<p id="login-button-content">Entrar<p>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>