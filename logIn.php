<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="twitter:title" content="Klothink - Ropa Sostenible y Personalizada" />
	<meta property="og:title" content="Klothink - Ropa Sostenible y Personalizada" />
	<meta name="keywords"
		content="Moda sostenible, ropa personalizada, estilo de vida, algoritmos, aprendizaje automático, impacto ambiental" />
	<meta name="twitter:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
	<meta property="og:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
	<meta name="description"
		content="Klothink - Encuentra ropa sostenible y personalizada que se adapta a tu estilo de vida y valores." />
	<title>Klothink - Iniciar sesión.</title>
	<link rel="icon" href="./images/brand-page.svg" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="./css/styles.css" />
	<script defer src="./js/script.js"></script>
</head>

<body>
	<?php require_once './components/header.php'; ?>
	<main>
		<section class="register">
			<img src="./images\background.png" alt="background">
			<div class="main">
				<section class="header">
					<img src="./images/brand-page.svg" alt="Logo de la marca">
					<h2>Iniciar sesión</h2>
					<div class="separator">
						<span>o</span>
					</div>
				</section>
				<form method="post" action="./database/users.php">
					<input type="hidden" name="action" value="login">
					<div class="form-group">
						<input type="text" name="name" placeholder="Ingresa tu Alias" required>
					</div>
					<div class="form-group password-container">
						<input type="password" name="password" id="register-password" placeholder="Contraseña" required>
						<span class="toggle-password">
							<img src="./images/hide-password.svg" alt="Toggle Password Visibility">
						</span>
					</div>
					<button class="btn-submit" type="submit">Inicia sesión</button>
				</form>
				<div class="footer">
					<p>¿No tienes una cuenta?</p>
					<a class="register-link" href="./register.php">Regístrate</a>
				</div>
			</div>
		</section>
	</main>
	<?php require_once './components/footer.php'; ?>
</body>

</html>