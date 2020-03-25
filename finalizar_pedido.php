<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "topo.php"; ?>
    <title>E-Phone Imports - Finalizar pedido</title>
</head>

<body>
	<div class="conteudo site">
		<?php include "menu.php"; ?>
		<?php $valorBase = isset($_GET['valor']) ? $_GET['valor'] : "0,00"; ?>
		
		<div class="conteudo site-section">
			<div class="conteudo carrinho">
				<h1>Pedido</h1>
				
				<div class="conteudo carrinho-info">
					<div class="conteudo carrinho-info-content"><p>Produto</p></div>
				</div>
				
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Xiaomi Redmi Note 8" src="img/produtos/Redmi_Note_8.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Xiaomi Redmi Note 8 Android 9 4GB 64GB Cam Quadrupla 48Mp+8Mp+2Mp+2Mp Cam Frontal 13Mp F2</a>
					</div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="Realme 5 Pro" src="img/produtos/Realme_5_Pro.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">Realme 5 Pro 4/128GB 48MP+8MP+2MP+2MP Traseira, 16MP Frontal, Tela 6.3 HD+ LCP IPS Gorilla Glass 3, 4035 bateria LiPo com carregamento rápido</a>
					</div>
				</div>
				<div class="conteudo carrinho-content">
					<div class="conteudo carrinho-content-img">
						<img title="OnePlus 7T Pro" src="img/produtos/One_Plus_7T_Pro.png">
					</div>
					<div class="conteudo carrinho-content-titulo">
						<a href="#">OnePlus 7T Pro 8/256GB 48MP+8MP+16MP Traseira, 16MP Frontal, Tela 6.67 QuadHD AMOLED Gorilla Glass, 4085 bateria LiPo com carregamento rápido</a>
					</div>
				</div>
			</div>
		
			<div class="conteudo forma-pagamento">
				<h1>Formas de pagamento</h1>
				
				<div class="conteudo formas">
					<p>Cartão de crédito</p>
					
					<div class="pagt-cartao">
						<span>Nome impresso no cartão</span>
						<input class="nome-cartao" type="text" id="cartao-nome"/>
						
						<span>CPF do titular do cartão</span>
						<input class="cpf-cartao" type="text" id="cartao-cpf" onkeypress="return somenteNumeros(event);" maxlength="11"/>
					
						<span>Número do cartão</span>
						<input class="num-cartao" type="text" id="cartao-num" onkeypress="return somenteNumeros(event);" maxlength="16"/>
						
						<span>Data de vencimento</span>
						<input class="data-venc" type="text" id="cartao-venc-dia" onkeypress="return somenteNumeros(event);" maxlength="2"/>
						<input class="data-venc" type="text" id="cartao-venc-ano" onkeypress="return somenteNumeros(event);" maxlength="2"/>
						
						<span>Valor de verificação do cartão (CVV)</span>
						<input class="data-venc" type="text" id="cartao-cvv" onkeypress="return somenteNumeros(event);" maxlength="3"/>
						
						<span>Parcelamento</span>
						<select name="parc" id="parc">
							<option id="parc-1" value="1x"></option>
							<option id="parc-2" value="2x"></option>
							<option id="parc-3" value="3x"></option>
							<option id="parc-4" value="4x"></option>
							<option id="parc-5" value="5x"></option>
							<option id="parc-6" value="6x"></option>
							<option id="parc-7" value="7x"></option>
							<option id="parc-8" value="8x"></option>
							<option id="parc-9" value="9x"></option>
							<option id="parc-10" value="10x"></option>
							<option id="parc-11" value="11x"></option>
							<option id="parc-12" value="12x"></option>
						</select>
					</div>
					
					<div class="pagt-boleto">
						<h1>Pagar com boleto: </h1>
						<input type="checkbox" id="boleto-selection"/>
						<p>1x de R$ <span id="pagt-boleto-text"></span> com 5% de desconto</p>
					</div>
				</div>
			</div>
			
			<div class="conteudo endereco">
				<p>Endereço para entrega</p>
				
				<div class="conteudo endereco-form">
					<span>Endereço</span>
					<input class="endereco-total" type="text" id="logradouro"/>
					
					<span>Bairro</span>
					<input type="text" id="bairro"/>
					
					<span>CEP</span>
					<input class="endereco-medio" type="text" id="cep" onkeypress="return somenteNumeros(event);" maxlength="8"/>
					
					<span>Cidade</span>
					<input class="endereco-medio" type="text" id="cidade"/>
					
					<span>Estado</span>
					<input class="endereco-medio" type="text" id="estado"/>
				</div>
				
				<p>Finalizar</p>
				<button class="conteudo finalizar-pedido-btn" onclick="concluirPedido();">Finalizar pedido</button>
			</div>
		</div>
	</div>
	
	<?php include "rodape.php"; ?>
	<script> $(document).ready(function() { atualizarParcelamentos(<?php echo $valorBase; ?>); }); </script>
</body>

</html>