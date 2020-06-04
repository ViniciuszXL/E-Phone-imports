<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Produtos</title>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<div class="conteudo site-section">
			<p class="conteudo categoria-title">
				<a href="index.php">Início</a> > 
				<a href="produtos.php">Produtos</a>
			</p>
			
			<div class="conteudo categoria">
				<ul>
					<h1>Categorias</h1>
					<?php $array = Categorias::getCategories(true); $decoded = json_decode($array, true); 
						$resultado = $decoded['resultado']; ?>
						
					<?php if ($resultado != "erro") {
						$quantidade = $decoded['quantidade']; $i; for ($i = 0; $i < $quantidade; $i++) {?>
						<li><a href="#"><?php echo $decoded[$i]['nome']."(".$decoded[$i]['quantidade'].")"; ?></a></li>
					<?php } } else { ?>
						<p>Sem categorias cadastradas!</p>
					<?php } ?>
			</div>
			
			<?php $array = Produtos::getProducts(false); $decoded = json_decode($array, true); 
					$resultado = $decoded['resultado']; $value = $decoded['mensagem']; ?>
						
			<?php if ($resultado == "erro") { ?>
				<p><?php echo $value; ?></p>
			<?php } else { $quantidade = $decoded['quantidade']; $i; for ($i = 1; $i <= $quantidade; $i++) { ?>
				<div class="conteudo categoria-produto">
					<img src="<?php echo $decoded[$i]['imagem']; ?>">
					<div class="conteudo categoria-produto-info">
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
	
	<?php include "rodape.php"; ?>
</body>

</html>