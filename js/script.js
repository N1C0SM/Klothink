/**
 * Filtra los productos según la categoría seleccionada.
 *
 * @param {string} category - La categoría de productos a filtrar ('men', 'women', 'unisex', 'all').
 * @description
 * La función selecciona todos los elementos `<article>` y verifica si contienen
 * la clase correspondiente a la categoría seleccionada. Si la categoría es 'all',
 * todos los productos se muestran. De lo contrario, solo se muestran aquellos
 * que coinciden con la categoría.
 */
function filterProducts(category) {
    console.log('hola me estoy ejecutando')
    let articles = document.querySelectorAll('article');
    articles.forEach(article => {
        if (article.classList.contains(category) || category === 'all') {
            article.style.display = 'block';
        } else {
            article.style.display = 'none';
        }
    });
}
/**
 * Funcion que establece el botón activo según la selección del usuario.
 *
 * @param {HTMLElement} button - El botón que debe ser marcado como activo.
 * @description
 * La funcion recorre una lista de botones y elimina la clase 'active' de todos ellos.
 * Luego, agrega la clase 'active' al botón seleccionado para reflejar la acción del usuario.
 */
function setActiveButton(button) {
    buttons.forEach(btn => {
        btn.classList.remove('active');
    });
    button.classList.add('active');
}
let buttons = document.querySelectorAll('.filters button');
buttons.forEach(button => {
    button.onclick = function() {
       filterProducts(button.id);
        setActiveButton(button);
    };
});
/**
 * Funcion que cambia la imagen del icono de visibilidad de contraseña y el tipo de input
 * dependiendo de si el usuario quiere ver u ocultar la contraseña.
 */
function changeImage() {
    let passwordField = document.getElementById('register-password');
    let togglePassword = document.querySelector('.toggle-password');
    let image = togglePassword.querySelector('img');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        image.src = '../images/show-password.svg';
    } else {
        passwordField.type = 'password';
        image.src = '../images/hide-password.svg';
    }
}
/**
 * Funcion que agrega productos al carrito visualizando detalles en el DOM.
 *
 * @param {number|string} productId - ID del producto que se quiere agregar.
 * @description
 * La funcion agrega el ID del producto al arreglo `productsCart` y actualiza el DOM
 * mostrando el producto en el carrito. La estructura incluye la imagen,
 * título, cantidad y precio del producto.
 */
function addProductToCart(productId) {
    let productsCart = [];
    productsCart.push(productId);
    Array.from(productsCart).forEach(product => {
        const article = document.createElement('article');
        const figure = document.createElement('figure');
        const img = document.createElement('img');
        img.src = product.image[0];
        img.alt = "image-array_product";
        figure.appendChild(img);
        article.appendChild(figure);

        const header = document.createElement('div');
        header.classList.add('header');

        const title = document.createElement('div');
        title.classList.add('title');
        title.textContent = product.name;
        header.appendChild(title);

        const fit = document.createElement('h4');
        fit.classList.add('fit');
        fit.textContent = product.fit;
        header.appendChild(fit);

        article.appendChild(header);

        const figcaption = document.createElement('figcaption');

        const quantity = document.createElement('h2');
        quantity.classList.add('quantity');
        const input = document.createElement('input');
        input.type = 'number';
        quantity.appendChild(input);
        figcaption.appendChild(quantity);

        const price = document.createElement('h3');
        price.classList.add('price');
        price.textContent = `$${product.price}`;
        figcaption.appendChild(price);

        const trashImg = document.createElement('img');
        trashImg.src = './images/trash.svg';
        trashImg.alt = 'Eliminar producto';
        figcaption.appendChild(trashImg);

        article.appendChild(figcaption);

        document.getElementById('products').appendChild(article);
    });
}
/**
 * Funcion que calcula el precio total de los productos en el carrito.
 *
 * @description
 * La funcion recorre todos los productos en el carrito, obtiene el precio y la cantidad
 * de cada producto, y calcula el total. El resultado se muestra en el elemento
 * con ID `show-price`.
 */
function calculateTotal() {
    let productCart = document.querySelectorAll('#productCart article');
    let totalPrice = 0;
    productCart.forEach(product => {
        let priceElement = product.querySelector('.price');
        let price = parseFloat(priceElement.textContent.trim());

        let quantityInput = product.querySelector('.product-quantity');
        let quantity = parseInt(quantityInput.value, 10);
        totalPrice += price * quantity;
    });
    let priceContainer = document.getElementById('show-price');
    if (priceContainer) {
        priceContainer.textContent = totalPrice.toFixed(2) + ' €';
    }
}
document.querySelectorAll('.product-quantity').forEach(input => {
    input.addEventListener('input', calculateTotal);
});
window.addEventListener('load', calculateTotal);
/**
 * Funcion que muestra un cuadro de diálogo de confirmación para eliminar un producto y, si el usuario lo confirma,
 * envía una solicitud al servidor para eliminarlo.
 *
 * @param {string} message - El mensaje base que se mostrará en el cuadro de diálogo de confirmación.
 * @param {number} productId - El identificador único del producto que se desea eliminar.
 *
 * @description
 * Si el usuario confirma, se envía una solicitud HTTP POST al servidor para eliminar el producto,
 * incluyendo su ID en el cuerpo de la solicitud. La respuesta del servidor indica si la operación
 * fue exitosa o fallida.
 */


/**
 *  Muestra un cuadro de diálogo de confirmación para eliminar un producto y, si el usuario lo confirma,
 * envía una solicitud al servidor para eliminarlo.
 * @param {number} productId - El identificador único del producto que se desea eliminar.
 * @param {string} productName - El nombre del producto que se desea eliminar.
 * @returns {boolean} - Devuelve true si el usuario confirma la eliminación, de lo contrario false.
 * @description
 * Si el usuario confirma, se muestra un mensaje de confirmación con el ID y nombre del producto.
 * La función devuelve true si el usuario confirma la eliminación, de lo contrario devuelve false.
 */
function confirmDelete(ev, productId, productName) {
        let message = `¿Estás seguro de eliminar el producto con ID: ${productId} (${productName})?`;
    if (!confirm(message)) {
        return ev.preventDefault();
    }

}
/**
 * Permite editar un producto habilitando el campo de entrada correspondiente.
 * @param {number} productId - El identificador único del producto que se desea editar.
 * @description
 * La función habilita el campo de entrada correspondiente al producto para permitir su edición
 * y enfoca el campo de entrada.
 */
function editProduct(event) {
    event.preventDefault();

    let form = event.target;
    let button = form.fit;
    if (button.readonly) {
        button.removeAttribute("readonly")
    } else {
        button.add('readonly')
    }

}