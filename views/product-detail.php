<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="twitter:title" content="Klothink - Ropa Sostenible y Personalizada" />
    <meta property="og:title" content="Klothink - Ropa Sostenible y Personalizada" />
    <meta name="keywords" content="Moda sostenible, ropa personalizada, estilo de vida, algoritmos, aprendizaje automático, impacto ambiental" />
    <meta name="twitter:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
    <meta property="og:description" content="Encuentra ropa que se adapte a tu estilo de vida y valores." />
    <meta name="description" content="Klothink - Encuentra ropa sostenible y personalizada que se adapta a tu estilo de vida y valores." />
    <title>Klothink - Encuentra ropa que se adapte a tu estilo de vida y valores.</title>
    <link rel="icon" href="./images/brand-page.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/styles.css" />
    <?php include './database/db.php'; ?>
    <script defer src="./js/script.js"></script>
</head>

<body>
    <?php require_once('./components/header.php') ?>
    <main>
        <?php
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $host = 'localhost';
            $dbname = 'klothink';
            $username = 'root';
            $password = '';

            $conn = mysqli_connect($host, $username, $password, $dbname);

            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM products WHERE id = '$id'";
            $connquery = mysqli_query($conn, $query);
            if ($connquery && $product = $connquery->fetch_assoc()) {
                $productImagesUrls = !empty($product['images']) ? explode(',', $product['images']) : [];
            } else {
                header('Location: http://localhost/klothink/error.php');
            }
        } else {
            header('Location: http://localhost/klothink/error.php');
            exit;
        }
        ?>
        <section class="product-detail">
            <div class="product">
                <?php if (!empty($productImagesUrls)): ?>
                    <figure>
                        <img src="<?= htmlspecialchars($productImagesUrls[0]) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    </figure>
                    <div class="images">
                        <?php foreach ($productImagesUrls as $imageUrl): ?>

                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                <div class="action-buttons">
                                    <form method="post" action="./database/edit-product.php" class="delete-button" onsubmit="confirmDelete(<?= htmlspecialchars($product['id']); ?>, '<?= htmlspecialchars($product['name']); ?>')">
                                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                                        <button type="submit" class="delete-button" title="Eliminar talla-<?= htmlspecialchars($product['sizes'][0]); ?>">
                                            <img src="./images/Minus.png" alt="Eliminar">
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <figure>
                                <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                <!-- <form method="post" action="./database/edit-product.php" class="edit-button">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']); ?>">
                                    <button type="submit">
                                        <img src="./images/pen-solid.svg" alt="Editar">
                                    </button>
                                </form> -->
                            </figure>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No hay imágenes disponibles para este producto.</p>
                <?php endif; ?>
            </div>
            <div class="details">
                <div class="header">
                    <div class="title">
                        <h2><?= htmlspecialchars($product['name']) ?></h2>
                        <h3 class="price"><?= htmlspecialchars($product['price']) ?></h3>
                    </div>
                    <div class="buttons">
                        <button class="buy">
                            <p>Comprar ahora</p>
                            <img src="./images/buy.svg" alt="buy-icon" />
                        </button>
                        <input type="hidden" name="product_id" value="1">
                        <button type="submit" id="add-to-cart" onclick="addProductToCart(<?= htmlspecialchars($product['id']) ?>)">
                            <p>Añadir al carrito</p>
                            <img src="./images\cart.svg" alt="cart-icon">
                        </button>
                    </div>
                </div>
                <div class="blocks">
                    <div class="block">
                        <div class="header">
                            <div class="matherial">
                                <h3>Material</h3>
                                <form method="post" action="./database/edit-product.php" class="edit-button">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']); ?>">
                                    <input type="text" name="material" value="<?= htmlspecialchars($product['material']); ?>" class="overlay-input" readonly required>
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                        <button type="submit">
                                            <img src="./images/pen-solid.svg" alt="Editar Material">
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </div>
                            <div class="fit">
                                <h3>Fit</h3>
                                <form method="post" onsubmit="editProduct(event)" action="./database/edit-product.php" class="edit-button">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']); ?>">
                                    <input type="text" name="fit" value="<?= htmlspecialchars($product['fit']); ?>" class="overlay-input" readonly required>
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                        <button type="submit">
                                            <img src="./images/pen-solid.svg" alt="Editar Fit">
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </div>
                            <div class="colour">
                                <h3>Color</h3>
                                <div class="inputs" id="color-picker">
                                    <?php $colours = explode(',', $product['colours']); ?>
                                    <?php foreach ($colours as $colour): ?>
                                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                            <div class="action-buttons">
                                                <form method="post" action="./database/edit-product.php" class="delete-button" onsubmit="confirmDelete(<?= htmlspecialchars($product['id']); ?>, '<?= htmlspecialchars($product['name']); ?>')">
                                                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                                                    <button type="submit" class="delete-button" title="Eliminar talla-<?= htmlspecialchars($product['sizes'][0]); ?>">
                                                        <img src="./images/Minus.png" alt="Eliminar">
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                        <input value="<?= htmlspecialchars($colour) ?>" class="color" type="radio" style="background: <?= htmlspecialchars($colour) ?>;">
                                    <?php endforeach; ?>
                                </div>

                            </div>
                            <div class="sizes">
                                <h3>Tallas</h3>
                                <div class="inputs">
                                    <?php $sizes = explode(',', $product['sizes']) ?>
                                    <?php foreach ($sizes as $size): ?>
                                        <section id="<?= htmlspecialchars($size) ?>">
                                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                                <div class="action-buttons">
                                                    <form method="post" action="./database/edit-product.php" class="delete-button" onsubmit="confirmDelete(<?= htmlspecialchars($product['id']); ?>, '<?= htmlspecialchars($product['name']); ?>')">
                                                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']); ?>">
                                                        <button type="submit" class="delete-button" title="Eliminar talla-<?= htmlspecialchars($product['sizes'][0]); ?>">
                                                            <img src="./images/Minus.png" alt="Eliminar">
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                            <input type="checkbox" id="<?= htmlspecialchars($size) ?>-size">
                                            <label for="<?= htmlspecialchars($size) ?>-size"><?= htmlspecialchars($size) ?></label>
                                        </section>
                                    <?php endforeach ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <h3>Información de envio</h3>
                        <?php $shopping_information = explode(',', $product['shopping_information']) ?>
                        <ul>
                            <?php foreach ($shopping_information as $information) : ?>
                                <li>
                                    <input type="text" name="shopping_information" value="<?= htmlspecialchars($information); ?>" class="overlay-input" readonly required>
                                </li>
                            <?php endforeach ?>

                        </ul>

                    </div>
                    <div class="block">
                        <h3>Características</h3>
                        <?php $characteristics = explode(',', $product['characteristics']) ?>
                        <ul>
                            <?php foreach ($characteristics as $c) : ?>
                                <li>
                                    <input type="text" name="characteristics" value="<?= htmlspecialchars($c); ?>" class="overlay-input" readonly required>
                                </li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <?php require_once './components/reviews.php'; ?>
        <?php require_once './components/faq.php'; ?>
    </main>
    <?php require_once './components/footer.php'; ?>
</body>

</html>