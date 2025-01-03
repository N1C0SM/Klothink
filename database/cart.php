<?php
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}

$product = [
	'id' => 1,
	'name' => 'Camiseta de Algodón',
	'price' => 29.99,
	'quantity' => 1
];

$found = false;
foreach ($_SESSION['cart'] as &$item) {
	if ($item['id'] == $product['id']) {
		$item['quantity'] += 1;
		$found = true;
		break;
	}
}

if (!$found) {
	$_SESSION['cart'][] = $product;  // Si no existe el producto en el carrito, lo agregamos
}

header('Location: cart.php');
exit();
