<?php
require_once 'db.php';
$conn = connectDatabase();
$id = $_POST['product_id'];
$sql = "DELETE FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
	die('Error al eliminar el producto: ' . $conn->error);
}
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
	echo "Producto eliminado correctamente.";
	header("Location: ../products.php");
	exit();
} else {
	echo "Error al eliminar el producto: " . $stmt->error;
}
$stmt->close();
$conn->close();
