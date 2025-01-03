<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="twitter:title" content="Klothink - Ropa Sostenible y Personalizada" />
	<meta property="og:title" content="Klothink - Ropa Sostenible y Personalizada" />
	<meta name="keywords" content="moda sostenible, ropa personalizada, estilo de vida, algoritmos, aprendizaje automático, impacto ambiental" />
	<meta name="twitter:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
	<meta property="og:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
	<meta name="description" content="Klothink - Encuentra ropa sostenible y personalizada que se adapta a tu estilo de vida y valores." />
	<title>Clothink - Encuentra ropa que se adapte a tu estilo de vida y valores.</title>
	<link rel="stylesheet" href="./css/styles.css" />
	<link rel="icon" href="./images/brand-page.svg" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
	<script src="./js/script.js"></script>
</head>

<body>
	<?php require_once('./components/header.php') ?>
	<main>
		<section class="hero">
			<section class="header">
				<section class="title">
					<h1>soporte klothink</h1>
					<h3>Tu aliado de moda</h3>
					</div>
				</section>
				<p>Asistencia las 24 horas del día, los 7 días de la semana para compras sin problemas y una satisfacción del cliente
					inigualable.</p>
			</section>
			<section class="news">
				<div class="new">
					<h2>Correo electronico</h2>
					<p>info.klothink@gmail.com</p>
				</div>
				<div class="new">
					<h2>llamanos al</h2>
					<p>+ 34 689 90 66 38</p>
				</div>
				<div class="new">
					<h2>horario de trabajo</h2>
					<p>disponible 24/7</p>
				</div>
			</section>
		</section>
		<section class="hero">
			<section class="header">
				<section class="title">
					<h1>politica de devoluciones</h1>
					<h3>devoluciones faciles en klothink</h3>
					<a href="./returns-polite.php">
						<button>
							<p>leer la politica de devoluciones</p>
							<img src="./images/arrow-right-black.svg" alt="arrow-right-black">
						</button>
					</a>
				</section>

			</section>
			<p>Explore nuestra política de devolución sin complicaciones diseñada para garantizar su satisfacción con cada compra.</p>
			<section class="news">
				<div class="new">
					<h2>elegibilidad</h2>
					<p>Los artículos deben estar sin usar, con etiquetas adjuntas y devueltos dentro de los 30 días posteriores a la entrega.</p>
				</div>
				<div class="new">
					<h2>proceso</h2>
					<p>Los artículos deben estar sin usar, con etiquetas adjuntas y devueltos dentro de los 30 días posteriores a la entrega.</p>
				</div>
				<div class="new">
					<h2>devolucion</h2>
					<p>Espere un reembolso a su método de pago original dentro de 7-10 días hábiles.</p>
				</div>
			</section>
		</section>
		<section class="hero">
			<section class="header">
				<section class="title">
					<h1>politica de cancelación</h1>
					<h3>experiencia de pedido flexible</h3>
					<a href="./cancelation-polite.php">
						<button>
							<p>leer la politica de cancelaciones</p>
							<img src="./images/arrow-right-black.svg" alt="arrow-right-black">
						</button>
					</a>
					</div>
				</section>
				<p>Familiarízate con nuestra política de cancelación para realizar cambios en tu pedido con facilidad.</p>

			</section>
			<section class="news">
				<div class="new">
					<h2>Ventana de cancelación</h2>
					<p>Los pedidos se pueden cancelar dentro de las 24 horas posteriores a la realización para obtener un reembolso completo.</p>
				</div>
				<div class="new">
					<h2>Proceso de cancelación</h2>
					<p>Visite nuestra sección de Gestión de pedidos para cancelar su pedido sin esfuerzo.</p>
				</div>
				<div class="new">
					<h2>Cronograma de reembolso</h2>
					<p>Los reembolsos de los pedidos cancelados se procesan en un plazo de 5 a 7 días hábiles.</p>
				</div>
			</section>
		</section>

		</section>
	</main>
	<?php require_once './components/footer.php'; ?>
</body>

</html>