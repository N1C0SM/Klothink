<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Klothink - Mi Carrito</title>
	<link rel="stylesheet" href="./css/styles.css">
	<script defer src="./js/script.js"></script>
</head>

<body>
	<?php require_once './components/header.php'; ?>
	<main>
		<section class="cart">
			<section class="header">
				<h2>Mi carrito</h2>
				<h3>Tienes <?php echo count($_SESSION['cart']); ?> item(s) en la cesta</h3>
			</section>

			<section class="main">
				<section class="products" id="productCart">
					<?php
					if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
						foreach ($_SESSION['cart'] as $item) {
							echo "<div class='product'>
                                    <h4>{$item['name']}</h4>
                                    <p>Precio: €{$item['price']}</p>
                                    <p>Cantidad: {$item['quantity']}</p>
                                    <p>Total: €" . $item['price'] * $item['quantity'] . "</p>
                                  </div>";
						}
					} else {
						echo "<p>No hay productos en tu carrito.</p>";
					}
					?>
				</section>

				<section class="aside">
					<div class="main">
						<div class="header">
							<div class="title">
								<h2>Detalles de la tarjeta</h2>
							</div>
							<div class="image">
								<img src="./images/profile.jpg" alt="">
							</div>
						</div>

						<form action="process_payment.php" method="POST">
							<label for="cardName">Nombre de la tarjeta</label>
							<input type="text" id="cardName" name="cardName" placeholder="Nombre" required>

							<label for="cardNumber">Número de la tarjeta</label>
							<input type="text" id="cardNumber" name="cardNumber" placeholder="1111 2222 3333 4444" required>

							<div class="footer-button">
								<div class="expiration-date">
									<label for="date">Fecha de expiración</label>
									<input type="text" placeholder="mm/yy" id="date" name="date" required>
								</div>
								<div class="cvv">
									<label for="cvv">CVV</label>
									<input type="text" placeholder="123" id="cvv" name="cvv" required>
								</div>
							</div>

							<div class="footer">
								<div class="subtotal">
									<h4>Subtotal</h4>
									<p id="subtotal">
										<?php
										$subtotal = 0;
										foreach ($_SESSION['cart'] as $item) {
											$subtotal += $item['price'] * $item['quantity'];
										}
										echo number_format($subtotal, 2);
										?>
									</p>
								</div>
								<div class="envio">
									<h4>Envío</h4>
									<p>€5.00</p> <!-- Aquí puedes calcular el envío dinámicamente si quieres -->
								</div>
								<div class="total">
									<h4>Total</h4>
									<p id="total">
										€<?= number_format($subtotal + 5, 2); ?> <!-- Total con envío -->
									</p>
								</div>
							</div>

							<button type="submit">
								<div id="show-price">€<?= number_format($subtotal + 5, 2); ?></div>
								<div class="text">Pagar</div>
								<img src="./images/arrow-right.svg" alt="arrow-right">
							</button>
						</form>
					</div>
				</section>
			</section>
		</section>
	</main>

	<?php require_once './components/footer.php'; ?>
</body>

</html>