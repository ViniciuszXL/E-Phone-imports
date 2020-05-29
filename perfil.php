<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Meu perfil</title>
	<?php if (!Controller::sessionStarted()) header('Location:login.php');?>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<div class="conteudo site-section">
			<div class="conteudo perfil">
				<h1>Bem-vindo, <?php echo $_SESSION['userNome']; ?></h1>
				<div class="conteudo perfil-pedidos">
					<h1>Últimos pedidos</h1>
					<div class="conteudo perfil-pedido">
						<?php $array = Cliente::getPurchasedItems(); $decoded = json_decode($array, true); 
							$resultado = $decoded['resultado']; $value = $decoded['value']; ?>
						
						<?php if ($resultado == "erro") { ?>
							<p><?php echo $value; ?></p>
						<?php } else { $compras = $decoded['compras']; $i; for ($i = 1; $i <= $compras; $i++) { ?>
							<div class="conteudo perfil-content">
								<div class="conteudo perfil-content-img">
									<img src="<?php echo $decoded[$i]['produtoImage']; ?>">
								</div>
								<div class="conteudo perfil-content-titulo">
									<a href="produto.php?id=<?php echo $decoded[$i]['produtoId']; ?>">
										<?php echo $decoded[$i]['produtoName']?>
									</a>
								</div>
								<div class="conteudo perfil-content-qnt"><?php echo $decoded[$i]['quantidade']?></div>
								<div class="conteudo perfil-content-subtotal">
									<p id="car-1"><?php echo Controller::formatMoney($total); ?></p>
								</div>
							</div>
						<?php } } ?>
					</div>
				</div>
				<div class="conteudo perfil-info">
					<h1>Minhas informações</h1>
					
					<div class="conteudo perfil-info-section">
						<h1>Nome: </h1>
						<p><?php echo $_SESSION['userNome']; ?></p>
					</div>
					<div class="conteudo perfil-info-section">
						<h1>Email: </h1>
						<p><?php echo $_SESSION['userEmail']; ?></p>
					</div>

				</div>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>