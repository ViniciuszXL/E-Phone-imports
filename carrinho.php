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
					<div class="conteudo carrinho-info-content"><p>Subtotal</p></div>
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
					<div class="conteudo carrinho-content-qnt">
						<input type="text" value="1" id="qnt-1" onkeypress="return somenteNumeros(event);"/>
					</div>
					<div class="conteudo carrinho-content-price"><p id="price-car-1">1.179,90</p></div>
					<div class="conteudo carrinho-content-subtotal"><p id="car-1">1.179,90</p></div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Realme 5 Pro" src="img/produtos/Realme_5_Pro.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Realme 5 Pro 4/128GB 48MP+8MP+2MP+2MP Traseira, 16MP Frontal, Tela 6.3 HD+ LCP IPS Gorilla Glass 3, 4035 bateria LiPo com carregamento rápido</a>
					</div>
					<div class="conteudo carrinho-content-qnt">
						<input type="text" value="1" id="qnt-2" onkeypress="return somenteNumeros(event);"/>
					</div>
					<div class="conteudo carrinho-content-price"><p id="price-car-2">1.485,55</p></div>
					<div class="conteudo carrinho-content-subtotal"><p id="car-2">1.485,55</p></div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="OnePlus 7T Pro" src="img/produtos/One_Plus_7T_Pro.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">OnePlus 7T Pro 8/256GB 48MP+8MP+16MP Traseira, 16MP Frontal, Tela 6.67 QuadHD AMOLED Gorilla Glass, 4085 bateria LiPo com carregamento rápido</a>
					</div>
					<div class="conteudo carrinho-content-qnt">
						<input type="text" value="1" id="qnt-3" onkeypress="return somenteNumeros(event);"/>
					</div>
					<div class="conteudo carrinho-content-price"><p id="price-car-3">4.579,90</p></div>
					<div class="conteudo carrinho-content-subtotal"><p id="car-3">4.579,90</p></div>
				</div>
				<button class="conteudo atualizar-btn" id="atualizar-btn" onclick="atualizarCarrinho();">Atualizar</button>
			</div>
			
			<div class="conteudo carrinho-cupom">
				<h1>Cupom:</h1>
				<input type="text" id="cupom" placeholder="Insira seu cupom"/>
				<button class="cupom-btn">Aplicar</button>
				<div class="cupom-notify" id="cupom-notify"></div>
			</div>
			
			<div class="conteudo carrinho-frete">
				<h1>Frete</h1>
				<input type="text" id="cep" placeholder="Informe seu CEP"/>
				<button class="frete-btn" onclick="calcularFrete();">Calcular</button>
				<div class="frete-notify" id="frete-notify"></div>
				
				<div class="fretes">
					<div class="frete-content">
						<h1>Expresso</h1>
						<h2>Dias úteis: 5-10 dias</h2>
						<p>Preço: </p>
						<span class="color-2" id="frete-expresso">R$ 82,50</span>
						<button class="frete-content-btn" onclick="selecionarFrete('expresso');">Selecionar</button>
					</div>
					<div class="frete-content">
						<h1>Normal</h1>
						<h2>Dias úteis: 15-30 dias</h2>
						<p>Preço: </p>
						<span class="color-2" id="frete-normal">R$ 42,15</span>
						<button class="frete-content-btn" onclick="selecionarFrete('normal');">Selecionar</button>
					</div>
				</div>
			</div>
			
			<div class="conteudo carrinho-checkout">
				<h1>Checkout</h1>
				
				<div class="checkout-content">
					<span>Itens no carrinho: </span> <p>3</p>
					<span>Subtotal: </span> <p id="subtotal" class="color-2">R$ 7.245,35</p>
					<span>Frete: </span> <p id="frete-include">R$ 0,00</p>
					<span>Cupom: </span> <p id="cupom-remove" class="color-c">-R$ 0,00</p>
					<span>Total: </span> <p id="total" class="color-2">R$ 7.245,35</p>
				</div>
				
				<button class="conteudo carrinho-btn-checkout" id="checkout-btn" onclick="finalizarPedido();">
					Finalizar pedido
				</button>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
</body>

</html>