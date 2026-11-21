const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");

let cart = JSON.parse(
    localStorage.getItem("silverRavensCart") || "[]"
);


// Save cart

function saveCart() {
    localStorage.setItem(
        "silverRavensCart",
        JSON.stringify(cart)
    );
}


// Update quantity

function changeQuantity(index, amount) {

    cart[index].quantity += amount;

    if (cart[index].quantity < 1) {
        cart[index].quantity = 1;
    }

    saveCart();
    displayCart();
}


// Remove product

function removeProduct(index) {

    cart.splice(index, 1);

    saveCart();
    displayCart();
}


// Display shopping cart

function displayCart() {

    cartItems.replaceChildren();

    let total = 0;

    if (cart.length === 0) {

        const message = document.createElement("p");

        message.className = "empty-cart";
        message.textContent = "Your shopping cart is empty.";

        cartItems.appendChild(message);

        cartTotal.textContent = "$0.00";

        return;
    }

    cart.forEach(function (product, index) {

        const subtotal = product.price * product.quantity;
        total += subtotal;

        const item = document.createElement("article");

        item.className = "cart-item";

        item.innerHTML = `
            <img class="cart-image">

            <div class="cart-product-info">

                <h2></h2>

                <p class="cart-product-options"></p>

                <p class="cart-product-price"></p>

            </div>

            <div class="cart-quantity">

                <button class="quantity-button decrease"
                        aria-label="Decrease quantity">
                    −
                </button>

                <span class="quantity-value"></span>

                <button class="quantity-button increase"
                        aria-label="Increase quantity">
                    +
                </button>

            </div>

            <button class="remove-button"
                    aria-label="Remove product">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M3 6h18M9 6V3h6v3M5 6l1 15h12l1-15M10 10v7M14 10v7"/>

                </svg>

            </button>
        `;

        const image = item.querySelector(".cart-image");

        image.src = "assets/images/" + product.image;
        image.alt = product.name;

        item.querySelector("h2").textContent = product.name;

        const options = [];

        if (product.size) {
            options.push("Size: " + product.size);
        }

        options.push("Color: " + product.color);

        item.querySelector(".cart-product-options").textContent =
            options.join(" | ");

        item.querySelector(".cart-product-price").textContent =
            "$" + subtotal.toFixed(2);

        item.querySelector(".quantity-value").textContent =
            product.quantity;

        item.querySelector(".decrease")
            .addEventListener("click", function () {
                changeQuantity(index, -1);
            });

        item.querySelector(".increase")
            .addEventListener("click", function () {
                changeQuantity(index, 1);
            });

        item.querySelector(".remove-button")
            .addEventListener("click", function () {
                removeProduct(index);
            });

        cartItems.appendChild(item);
    });

    cartTotal.textContent = "$" + total.toFixed(2);
}

displayCart();