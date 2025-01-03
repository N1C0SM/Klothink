<?php
session_start();
require_once './db.php';
if ($_SESSION['user_role'] === 'admin') {

	if (isset($_POST['id']) && !empty($_POST['id'])) {
		$conn = connectDatabase();

		if (!$conn) {
			die("Error de conexión: " . mysqli_connect_error());
		}

		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$query = '';

		if (isset($_POST['material']) || isset($_POST['fit']) || isset($_POST['colour']) || isset($_POST['size']) || isset($_POST['image']) || isset($_POST['shopping_information']) || isset($_POST['characteristic'])) {
			switch (true) {
				case isset($_POST['material']):
					$material = mysqli_real_escape_string($conn, $_POST['material']);
					if (empty($material)) {
						echo "El material no puede estar vacío.";
						exit;
					}
					$query = "UPDATE products SET material = '$material' WHERE id = '$id'";
					break;

				case isset($_POST['fit']):
					$fit = mysqli_real_escape_string($conn, $_POST['fit']);
					if (empty($fit)) {
						echo "El fit no puede estar vacío.";
						exit;
					}
					$query = "UPDATE products SET fit = '$fit' WHERE id = '$id'";
					break;

				case isset($_POST['colour']):
					$colour = mysqli_real_escape_string($conn, implode(',', $_POST['colour']));
					if (empty($colour)) {
						echo "Los colores no pueden estar vacíos.";
						exit;
					}
					$query = "UPDATE products SET colours = '$colour' WHERE id = '$id'";
					break;

				case isset($_POST['sizes']):
					$size = mysqli_real_escape_string($conn, implode(',', $_POST['size']));
					if (empty($size)) {
						echo "Las tallas no pueden estar vacías.";
						exit;
					}
					$query = "UPDATE products SET sizes = '$size' WHERE id = '$id'";
					break;

				case isset($_POST['images']):
					$image = mysqli_real_escape_string($conn, implode(',', $_POST['image']));
					if (empty($image)) {
						echo "Las imágenes no pueden estar vacías.";
						exit;
					}
					$query = "UPDATE products SET images = '$image' WHERE id = '$id'";
					break;

				case isset($_POST['shopping_information']):
					$shopping_information = mysqli_real_escape_string($conn, implode(',', $_POST['shopping_information']));
					if (empty($shopping_information)) {
						echo "La información de envío no puede estar vacía.";
						exit;
					}
					$query = "UPDATE products SET shopping_information = '$shopping_information' WHERE id = '$id'";
					break;

				case isset($_POST['characteristic']):
					$characteristic = mysqli_real_escape_string($conn, implode(',', $_POST['characteristic']));
					if (empty($characteristic)) {
						echo "Las características no pueden estar vacías.";
						exit;
					}
					$query = "UPDATE products SET characteristics = '$characteristic' WHERE id = '$id'";
					break;

				default:
					echo "Error: No se enviaron parámetros válidos para actualizar el producto.";
					exit;
			}
		} else {
			echo "Error: No se enviaron datos para actualizar.";
			exit;
		}
		if (mysqli_query($conn, $query)) {
			header("Location: http://localhost/klothink/product-detail.php?id=" . $id);
			exit;
		} else {
			echo "Error al actualizar el producto: " . mysqli_error($conn);
			exit;
		}
	} else {
		echo "Error: ID del producto no recibido.";
		exit;
	}
}
