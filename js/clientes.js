function login() {
	event.preventDefault();
	
	document.getElementById('login-button-content').innerHTML = "Entrando...";
	$('.login-notification-error').hide();
	$('.login-notification-success').hide();
	var interval = setInterval(function() {
		$.ajax({
			type: 'POST',
			url: './controller/Login.php',
			data: {
				email: document.getElementById('email').value,
				senha: document.getElementById('senha').value
			},
			cache: false,
			success: function(data) {
				var resultado = data['resultado'];
				var mensagem = data['mensagem'];
				if (resultado == "erro") {
					$('.login-notification-error').show();
					$('.login-notification-success').hide();
					document.getElementById('login-notification-error').innerHTML = mensagem;
					return;
				}
				
				$('.login-notification-error').hide();
				$('.login-notification-success').show();
				document.getElementById('login-notification-success').innerHTML = mensagem;
				var otherInterval = setInterval(function() {
					clearInterval(otherInterval);
					window.location.href = "perfil.php";
				}, 1000);
			},
			error: function(data) {
				console.log(data);
			}
		})
		
		document.getElementById('login-button-content').innerHTML = "Entrar";
		clearInterval(interval);
	}, 1000);

}

function registro() {
	event.preventDefault();
	
	document.getElementById('registro-button-content').innerHTML = "Registrando...";
	$('.registro-notification-error').hide();
	$('.registro-notification-success').hide();
	var interval = setInterval(function() {
		$.ajax({
			type: 'POST',
			url: './controller/Registro.php',
			data: {
				email: document.getElementById('email').value,
				nome: document.getElementById('fullname').value,
				username: document.getElementById('username').value,
				senha: document.getElementById('password').value
			},
			cache: false,
			success: function(data) {
				console.log(data);
				
				var resultado = data['resultado'];
				var mensagem = data['mensagem'];
				if (resultado == "erro") {
					$('.registro-notification-error').show();
					$('.registro-notification-success').hide();
					document.getElementById('registro-notification-error').innerHTML = mensagem;
					return;
				}
				
				$('.registro-notification-error').hide();
				$('.registro-notification-success').show();
				document.getElementById('registro-notification-success').innerHTML = mensagem;
				var otherInterval = setInterval(function() {
					clearInterval(otherInterval);
					window.location.href = "login.php";
				}, 1000);
			},
			error: function(data) {
				console.log(data);
			}
		})
		
		document.getElementById('registro-button-content').innerHTML = "Registrar";
		clearInterval(interval);
	}, 1000);

}