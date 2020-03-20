<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Carrinho</title>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<div class="conteudo site-section">
			<div class="conteudo carrinho">
				<h1>Meu carrinho</h1>
				
				<div class="conteudo carrinho-info">
					<div class="conteudo carrinho-info-content"><p>Produto</p></div>
					<div class="conteudo carrinho-info-content"><p>Sub-total</p></div>
					<div class="conteudo carrinho-info-content"><p>Preço</p></div>
					<div class="conteudo carrinho-info-content"><p>Quantidade</p></div>
				</div>
				
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Xiaomi Redmi Note 8" src="img/produtos/Redmi_Note_8.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Xiaomi Redmi Note 8 Android 9 4GB 64GB Cam Quadrupla 48Mp+8Mp+2Mp+2Mp Cam Frontal 13Mp F2</a>
					</div>
					<div class="conteudo carrinho-content-qnt"><input type="text" value="1" id="quantidade"/></div>
					<div class="conteudo carrinho-content-price"><p>1.179,90</p></div>
					<div class="conteudo carrinho-content-subtotal"><p>1.179,90</p></div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Xiaomi Redmi Note 8" src="img/produtos/Redmi_Note_8.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Xiaomi Redmi Note 8 Android 9 4GB 64GB Cam Quadrupla 48Mp+8Mp+2Mp+2Mp Cam Frontal 13Mp F2</a>
					</div>
					<div class="conteudo carrinho-content-qnt"><input type="text" value="1" id="quantidade"/></div>
					<div class="conteudo carrinho-content-price"><p>1.179,90</p></div>
					<div class="conteudo carrinho-content-subtotal"><p>1.179,90</p></div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Xiaomi Redmi Note 8" src="img/produtos/Redmi_Note_8.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Xiaomi Redmi Note 8 Android 9 4GB 64GB Cam Quadrupla 48Mp+8Mp+2Mp+2Mp Cam Frontal 13Mp F2</a>
					</div>
					<div class="conteudo carrinho-content-qnt"><input type="text" value="1" id="quantidade"/></div>
					<div class="conteudo carrinho-content-price"><p>1.179,90</p></div>
					<div class="conteudo carrinho-content-subtotal"><p>1.179,90</p></div>
				</div>
			</div>
			
			<div class="conteudo carrinho-checkout">
				<h1>Checkout</h1>
				
				<div class="carrinho-checkout-frete">
					<div class="carrinho-checkout-frete-title">
						<h1>Calcular frete <i id="frete-icon" class="fa fa-caret-up"></i></h1>
					</div>
					
					<div class="carrinho-checkout-frete-cep">
						<div class="checkout-frete-cep">
							<span>CEP: </span><input type="text" id="cep" value="69086-057"/>
						</div>
						<div class="checkout-frete-price">
							<p>Dias úteis: 5-10 dias</p>
							<p>Preço: R$ 23,40</p>
						</div>
					</div>
				</div>
				
				<div class="conteudo carrinho-checkout-content">
					<span>Itens no carrinho: </span> <p>3</p>
					<span>Preço dos itens: </span> <p class="color-2">R$3.539,7‬</p>
					<span>Cupom: </span> <p class="color-c">-R$‬353,97</p>
					<span>Sub-total: </span> <p class="color-2">R$3.185,73</p>
				</div>
				
				<button class="conteudo carrinho-btn-checkout">Finalizar pedido</button>
			</div>
			
			<div class="conteudo carrinho-cupom">
				<h1>Cupom:</h1>
				<input type="text" id="cupom" placeholder="Insira seu cupom"/>
				<button class="cupom-btn">Aplicar</button>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>