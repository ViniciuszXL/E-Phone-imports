$(".carrinho-checkout-frete-title").click(function() {
	updateIconAndShow('.carrinho-checkout-frete-cep', 'frete-icon');
});

function updateIconAndShow(menuName, menuIcon) {
	var caret = ($(menuName).is(':hidden')) ? 'fa fa-caret-up' : 'fa fa-caret-down';
	if ($(menuName).is(':hidden')) $(menuName).show("slow"); else $(menuName).hide("slow");
	
	var icon = document.getElementById(menuIcon);
	icon.className = caret;
}