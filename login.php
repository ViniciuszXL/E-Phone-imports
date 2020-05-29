<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Login</title>
	<?php if (Controller::sessionStarted()) header('Location:perfil.php');?>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<div class="conteudo site-section">
			<div class="conteudo login-info">
				<h1 class="color-6">Olá! Bem-vindo!</h1>
				<p>Essa é a área de login da E-Phone Imports!</p>
				<p>Somos uma empresa criada em 2020 para venda de celulares e acessórios importados. 
					Todos os produtos aqui possuem garantia de 3 meses.</p>
				<p>Caso você já tenha uma conta em nosso site, poderá fazer o login no mesmo ao lado</p>
				<p>Caso seja sua primeira vez aqui, você pode clicar abaixo para poder se registrar.</p>
				<a href="registrar.php">Registrar</a>
			</div>
			
			<div class="conteudo login">
				<h1>Entrar</h1>
				<div class="login-notification-success" id="login-notification-success"></div>
				<div class="login-notification-error" id="login-notification-error">Teste!</div>
				
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
							
						<button class="login-button" onclick="login();">
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