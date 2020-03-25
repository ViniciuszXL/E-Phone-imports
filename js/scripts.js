$(".carrinho-checkout-frete-title").click(function() {
	updateIconAndShow('.carrinho-checkout-frete-cep', 'frete-icon');
});

$(".cupom-btn").click(function() {
	let divName = 'cupom-notify';
	let cupom_remove = document.getElementById('cupom-remove').innerHTML;
	if (cupom_remove.indexOf('0,00') == -1) {
		alert('Você já aplicou um cupom!')
		return;
	}
	
	modifyClass(divName, divName);
	innerHTML(divName, 'Aplicando cupom...');
	showDiv('.' + divName);
	let interval = setInterval(function() {
		showDiv('.' + divName);
		clearInterval(interval);
	}, 6000);
	
	let otherInterval = setInterval(function() {
		clearInterval(otherInterval);
		
		let cupom = document.getElementById('cupom').value;
		if (cupom.length < 1) {
			modifyClass(divName, divName + ' color-c');
			innerHTML(divName, 'Por favor, informe um cupom.');
			return;
		}
		
		if (cupom != 'DESCONTAO') {
			modifyClass(divName, divName + ' color-c');
			innerHTML(divName, 'O cupom informado é inválido.');
			return;
		}
		
		modifyClass(divName, divName + ' color-2');
		innerHTML(divName, 'Cupom aplicado com sucesso.');
		
		let total = parseNumber(document.getElementById('total').innerHTML);
		let menos = formatarCupom(total);
		
		innerHTML('cupom-remove', '-R$ ' + formatarMoeda(menos));
		innerHTML('total', 'R$ ' + formatarMoeda(total - menos));
	}, 2000);
})

function somenteNumeros(e) {
	let tecla = window.event ? event.keyCode : e.which;
	if (tecla > 47 && tecla < 58)
		return true;
	if (tecla == 8 || tecla == 0)
		return true;
	return false;
}

function formatarCupom(total) {
	let valor = total * 20 / 100;
	let formatado = String(valor);
	formatado = formatado.substring(0, formatado - 1);
	return Number(formatado);
}

function formatarMoeda(valor) {
	return valor.toLocaleString('pt-br', {
		minimumFractionDigits: 2
	});
}

function parseNumber(value) {
	value = value.replace('.', '');
	value = value.replace(',', '.');
	value = value.replace('R$ ', '');
	return Number(value);
}

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function modifyClass(divName, newClass) {
	document.getElementById(divName).className = newClass;
}

function innerHTML(divName, divText) {
	document.getElementById(divName).innerHTML = divText;
}

function showDiv(divName) {
	if ($(divName).is(':hidden')) $(divName).show('slow'); else $(divName).hide('slow');
}

function updateIconAndShow(menuName, menuIcon) {
	showDiv(menuName);
	modifyClass(menuIcon, ($(menuName).is(':hidden')) ? 'fa fa-caret-up' : 'fa fa-caret-down');
}

function calcularFrete() {
	let cep = document.getElementById('cep').value;
	let freteIncluded = document.getElementById('frete-include').innerHTML != 'R$ 0,00';
	if (freteIncluded) {
		modifyClass('frete-notify', 'frete-notify color-c');
		innerHTML('frete-notify', 'Você já selecionou um frete!');
		
		if ($('.frete-notify').is(':hidden')) {
			$('.frete-notify').show('slow');
			let interval = setInterval(function() {
				$('.frete-notify').hide('slow');
				clearInterval(interval);
			}, 3500);
		}
		return;
	}
	
	modifyClass('frete-notify', 'frete-notify color-2');
	innerHTML('frete-notify', 'Verificando...');
	if ($('.frete-notify').is(':hidden'))
		showDiv('.frete-notify');
	if (!($('.checkout-fretes').is(':hidden')))
		$('.checkout-fretes').hide();
	
	let interval = setInterval(function() {
		clearInterval(interval);
		if (cep.length < 1) {
			innerHTML('frete-notify', 'Por favor, informe um CEP.');
			modifyClass('frete-notify', 'frete-cep-notify color-c');
			return;
		}
		
		if (!isNumber(cep)) {
			innerHTML('frete-notify', 'Apenas números no CEP!');
			modifyClass('frete-notify', 'frete-cep-notify color-c');
			return;
		}
		
		if (cep != '69086057') {
			innerHTML('frete-notify', 'CEP informado é inválido.');
			modifyClass('frete-notify', 'frete-cep-notify color-c');
			return;
		}
		
		innerHTML('frete-notify', 'Sucesso!');
		interval = setInterval(function() {
			$('.fretes').show('slow');
			$('.frete-notify').hide('slow');
			
			clearInterval(interval);
		}, 1000);
	}, 2500);
}

function selecionarFrete(tipo) {
	let price = document.getElementById('frete-' + tipo).innerHTML;
	console.log(price);
	price = parseNumber(price);
	console.log(price);
	
	let total = document.getElementById('total').innerHTML;
	total = parseNumber(total);
	
	let totalGeral = Number(price + total);
	modifyClass('frete-notify', 'frete-notify color-2');
	innerHTML('frete-notify', 'Frete selecionado com sucesso!');
	showDiv('.frete-notify');
	
	let interval = setInterval(function() {
		$('.fretes').hide('slow');
		$('.frete-notify').hide('slow');
		
		innerHTML('frete-include', 'R$ ' + formatarMoeda(price));
		innerHTML('total', 'R$ ' + formatarMoeda(totalGeral));
		
		clearInterval(interval);
	}, 2000);
}

function finalizarPedido() {
	let freteIncluded = document.getElementById('frete-include').innerHTML == 'R$ 0,00';
	if (freteIncluded) {
		alert('Escolha uma forma de entrega!');
		return;
	}
	
	innerHTML('checkout-btn', '<img src="img/carregamento.gif">');
	let interval = setInterval(function() {
		clearInterval(interval);
		
		innerHTML('checkout-btn', 'Redirecionando...');
		interval = setInterval(function() {
			window.location.href = 'finalizar_pedido.php?valor=' + parseNumber(document.getElementById('total').innerHTML);
			clearInterval(interval);
		}, 1000);
	}, 3000);
}

function pegarPrecoCarrinho(nome) {
	let price = document.getElementById(nome).innerHTML;
	price = parseNumber(price);
	return price;
}

function atualizarCarrinho() {
	let qnt1 = Number(document.getElementById('qnt-1').value);
	if (qnt1 == 0) {
		alert('A quantidade 0 é um valor inválido! Por favor, informe outro.');
		return;
	}
	
	let qnt2 = Number(document.getElementById('qnt-2').value);
	if (qnt2 == 0) {
		alert('A quantidade 0 é um valor inválido! Por favor, informe outro.');
		return;
	}
	
	let qnt3 = Number(document.getElementById('qnt-3').value);
	if (qnt3 == 0) {
		alert('A quantidade 0 é um valor inválido! Por favor, informe outro.');
		return;
	}
	
	innerHTML('atualizar-btn', '<img src="img/carregamento.gif">');
	let interval = setInterval(function() {
		clearInterval(interval);
		let valor1 = pegarPrecoCarrinho('price-car-1') * qnt1;
		let valor2 = pegarPrecoCarrinho('price-car-2') * qnt2;
		let valor3 = pegarPrecoCarrinho('price-car-3') * qnt3;
		
		innerHTML('atualizar-btn', 'Atualizar');
		innerHTML('car-1', formatarMoeda(valor1));
		innerHTML('car-2', formatarMoeda(valor2));
		innerHTML('car-3', formatarMoeda(valor3));
		
		let subtotal = valor1 + valor2 + valor3;
		innerHTML('subtotal', 'R$ ' + formatarMoeda(subtotal));
		
		let frete = parseNumber(document.getElementById('frete-include').innerHTML);
		if (frete != 0)
			subtotal = subtotal + frete;
		
		let desconto = parseNumber(document.getElementById('cupom-remove').innerHTML);
		if (desconto != 0) {
			desconto = formatarCupom(subtotal);
			subtotal = subtotal - desconto;
			innerHTML('cupom-remove', '-R$ ' + formatarMoeda(desconto));
		}
		
		innerHTML('total', 'R$ ' + formatarMoeda(subtotal));
	}, 2000);
}

function atualizarParcelamentos(valorBase) {
	if (valorBase == 0) {
		innerHTML('parc-1', 'Ocorreu um erro');
		return;
	}
		
	for (let i = 1; i <= 12; i++) {
		let valor = valorBase / i;
		valor = valor.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
		innerHTML('parc-' + i, i + 'x de R$ ' + formatarMoeda(valor) + ' sem juros');
		if (i == 1) {
			let valorDesc = parseNumber(valor);
			let desconto = valorDesc * 5 / 100;
			valorDesc = valorDesc - desconto;
			valorDesc = valorDesc.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
			innerHTML('pagt-boleto-text', formatarMoeda(valorDesc));
		}
	}
}

function concluirPedido() {
	let boleto = document.getElementById('boleto-selection');
	if (boleto.checked == false) {
		if (document.getElementById('cartao-nome').value == "") {
			alert("Por favor, informe o nome impresso no cartão.");
			return;
		}
		
		let cpf = document.getElementById('cartao-cpf').value;
		if (cpf == "" || cpf.length < 11) {
			alert("Por favor, informe o CPF do titular do cartão.");
			return;
		}
		
		let numero = document.getElementById('cartao-num').value;
		if (numero == "" || numero.length < 16) {
			alert("Por favor, informe o número do cartão.");
			return;
		}
		
		let vencimentoDia = document.getElementById('cartao-venc-dia').value;
		if (vencimentoDia == "" || vencimentoDia.length < 2) {
			alert("Por favor, informe o dia de vencimento do cartão.");
			return;
		}
		
		let vencimentoAno = document.getElementById('cartao-venc-ano').value;
		if (vencimentoAno == "" || vencimentoAno.length < 2) {
			alert("Por favor, informe o ano de vencimento do cartão.");
			return;
		}
		
		let cvv = document.getElementById('cartao-cvv').value;
		if (cvv == "" || vencimentoAno.length < 3) {
			alert("Por favor, informe o Valor de verificação do cartão (CVV) do cartão.");
			return;
		}
	}
	
	if (document.getElementById('logradouro').value == "") {
		alert("Por favor, informe seu endereço corretamente.");
		return;
	}
	
	if (document.getElementById('bairro').value == "") {
		alert("Por favor, informe seu bairro corretamente.");
		return;
	}
	
	if (document.getElementById('cep').value == "") {
		alert("Por favor, informe seu cep corretamente.");
		return;
	}
	
	if (document.getElementById('cidade').value == "") {
		alert("Por favor, informe seu cidade corretamente.");
		return;
	}
	
	if (document.getElementById('estado').value == "") {
		alert("Por favor, informe seu estado corretamente.");
		return;
	}
}