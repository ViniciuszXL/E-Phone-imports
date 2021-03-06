<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Início</title>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<div class="conteudo site-section">
			<div class="conteudo pesquisa">
				<input id="pesquisa" type="text" placeholder="Digite para pesquisar">
				<button onclick="pesquisar();">
					<i class="fa fa-search"></i>
				</button>
			</div>
			
			<div class="conteudo icones">
				<a href="#"><i class="fab fa-facebook-square"></i></a>
				<a href="#"><i class="fab fa-twitter-square"></i></a>
				<a href="#"><i class="fab fa-whatsapp-square"></i></a>
			</div>
			
			<div class="conteudo imagens">
				<img src="img/other-background.jpg">
			</div>
			
			<div class="conteudo produtos">
				<h1>Produtos</h1>
				<?php $array = Produtos::getProducts(true); $decoded = json_decode($array, true); 
						$resultado = $decoded['resultado']; $value = $decoded['mensagem']; ?>
						
				<?php if ($resultado == "erro") { ?>
					<p><?php echo $value; ?></p>
				<?php } else { $quantidade = $decoded['quantidade']; $i; for ($i = 1; $i <= $quantidade; $i++) { ?>
					<div class="conteudo produto">
						<img src="<?php echo $decoded[$i]['imagem']; ?>">
						<div class="conteudo produto-info">
							<h2><?php echo $decoded[$i]['marca']; ?></h2>
							<h1><?php echo $decoded[$i]['nome']; ?></h1>
							<h2><?php echo $decoded[$i]['versao']; ?></h2>
							
							<h3><?php echo Controller::formatMoney($decoded[$i]['preco']); ?></h3>
							<span>10x de 
								<?php echo Controller::formatMultiple($decoded[$i]['preco']); ?> sem juros ou 
								<?php echo Controller::formatPercentage($decoded[$i]['preco']); ?> no boleto</span>
						</div>
						<a class="conteudo produto-btn" href="produto.php?id=<?php echo $decoded[$i][$id]; ?>" title="Ver detalhes do produto">Ver mais</a>
					</div>
				<?php } } ?>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>