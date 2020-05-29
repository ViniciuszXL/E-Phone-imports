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
			<div class="conteudo registro">
				<h1>Registrar</h1>
				<div class="registro-notification-success" id="registro-notification-success"></div>
				<div class="registro-notification-error" id="registro-notification-error">Teste!</div>
				
				<form method="POST" id="registro_form">
					<div class="registro-content-form">
						<span>E-mail</span>
						<input type="email" id="email"/>
					</div>
					<div class="registro-content-form">
						<span>Nome completo</span>
						<input type="text" id="fullname"/>
					</div>
					<div class="registro-content-form">
						<span>Nome de usuário</span>
						<input type="text" id="username"/>
					</div>
					<div class="registro-content-form">
						<span>Senha</span>
						<input type="password" id="password"/>
					</div>
						
					<button class="registro-button" onclick="registro();">
						<p id="registro-button-content">Registrar<p>
					</button>
				</form>
			</div>
			
			<div class="conteudo registro-info">
				<h1 class="color-6">Registro</h1>
				<p>Olá, visitante! Você está na página de registro de nosso site.</p>
				<p>Informe corretamente os campos ao lado para efetuar seu registro em nosso site.</p>
				<p>Caso já possua um registro, você pode ir para a página de login clicando na opção abaixo.</p>
				<a href="login.php">Entrar</a>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>