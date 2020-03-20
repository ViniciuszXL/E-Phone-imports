<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Login</title>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
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