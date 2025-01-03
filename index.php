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
    <?php require_once './database/db.php'; ?>
    <?php require_once './database/products.php'; ?>
    <?php require_once './database/collections.php'; ?>
    <script defer src="./js/script.js"></script>
</head>

<body>
    <?php require_once('./components/header.php') ?>
    <main>
        <section class="hero">
            <section class="header">
                <section class="title">
                    <h1>Descubre la moda.</h1>
                    <h3>Productos</h3>
                </section>
                <p>Sumérgete en un mundo de innovación en moda en Klothink. Nuestras colecciones cuidadosamente seleccionadas reúnen las últimas tendencias y clásicos atemporales, asegurándote de encontrar las piezas perfectas para cada ocasión.</p>
            </section>
            <section class="news">
                <div class="new">
                    <h2>Novedades</h2>
                    <p>50+ nuevas diarias</p>
                </div>
                <div class="new">
                    <h2>Más de 1,500+</h2>
                    <p>Productos de moda seleccionados</p>
                </div>
            </section>
        </section>
        <section class="filters-container">
            <div class="filters gender">
                <button id="all">Todo</button>
                <button id="men"><img src="./images/shirt.svg" alt="Ropa de caballeros" /> Ropa de caballeros</button>
                <button id="women"><img src="./images /dress.svg" alt="Ropa de mujer" /> Ropa de mujer</button>
                <button id="unisex"><img src="./images/baby-dress.svg" alt="Ropa unisex" /> Ropa unisex</button>
            </div>
        </section>
        <section class="collections">
            <?php foreach ($collections as $collection): ?>
                <div class="collection" id="<?= htmlspecialchars($collection['name']); ?>">
                    <div class="header">
                        <div class="title">
                            <h2><?= htmlspecialchars($collection['name']); ?></h2>
                            <p><?= htmlspecialchars($collection['description']); ?></p>
                        </div>
                    </div>
                    <div class="clothes footer">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product['collection_id'] === $collection['id']): ?>
                                <article class="<?= htmlspecialchars($product['gender'] === 'men' ? 'men' : ($product['gender'] === 'women' ? 'women' : 'unisex')); ?> <?= htmlspecialchars($collection['name']); ?>">
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                        <div class="action-buttons">
                                            <form method="post" action="./database/delete-product.php" class="delete-button" onsubmit="confirmDelete(event,<?= htmlspecialchars($product['id']); ?>, '<?= htmlspecialchars($product['name']); ?>')">
                                                <button type="submit" class="delete-button" title="Eliminar producto <?= htmlspecialchars($product['name']); ?>">
                                                    <img src="./images/Minus.png" alt="Eliminar">
                                                </button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                    <?php $productsImagesUrls = explode(',', $product['images']); ?>
                                    <figure>
                                        <a href="./product-detail.php?id=<?= htmlspecialchars($product['id']); ?>">
                                            <img src="<?= htmlspecialchars($productsImagesUrls[0]); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                                        </a>
                                    </figure>
                                    <figcaption>
                                        <h2><a href="./product-detail.php?id=<?= htmlspecialchars($product['id']); ?>"><?= htmlspecialchars($product['name']); ?></a></h2>
                                        <div class="footer">
                                            <h3><?= htmlspecialchars($product['fit']); ?></h3>
                                            <span><?= htmlspecialchars($product['price']); ?></span>
                                        </div>
                                    </figcaption>
                                </article>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php require_once './components/faq.php'; ?>
    <?php require_once './components/footer.php'; ?>
</body>

</html>