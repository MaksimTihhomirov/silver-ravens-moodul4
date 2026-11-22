const mainImage = document.getElementById("main-product-image");
const thumbnails = document.getElementById("product-thumbnails");
const sizeOptions = document.getElementById("size-options");
const colorOptions = document.getElementById("color-options");

const sizes = product.sizes || [];

let selectedSize = sizes.includes("M")
    ? "M"
    : sizes[0] || "";

let selectedColor = product.colors[0];

const colorValues = {
    Black: "#000000",
    White: "#FFFFFF",
    Blue: "#0066FF",
    Purple: "#682A95"
};


// Product gallery

function updateGallery() {

    const images = product.images[selectedColor] || [];

    thumbnails.replaceChildren();

    if (images.length === 0) {
        mainImage.removeAttribute("src");
        return;
    }

    mainImage.src = imagePath + "/" + images[0];

    images.forEach(function (image, index) {

        const button = document.createElement("button");
        button.className = "thumbnail-button";
        button.type = "button";
        button.setAttribute("aria-label", "View image " + (index + 1));

        if (index === 0) {
            button.classList.add("active");
        }

        const img = document.createElement("img");
        img.src = imagePath + "/" + image;
        img.alt = product.name;

        button.appendChild(img);

        button.addEventListener("click", function () {

            mainImage.src = imagePath + "/" + image;

            thumbnails.querySelectorAll("button").forEach(function (item) {
                item.classList.remove("active");
            });

            button.classList.add("active");
        });

        thumbnails.appendChild(button);
    });
}


// Select size

if (sizeOptions) {

    sizes.forEach(function (size) {

        const button = document.createElement("button");
        button.className = "size-button";
        button.type = "button";
        button.textContent = size;

        if (size === selectedSize) {
            button.classList.add("active");
        }

        button.addEventListener("click", function () {

            selectedSize = size;

            sizeOptions.querySelectorAll("button").forEach(function (item) {
                item.classList.remove("active");
            });

            button.classList.add("active");
        });

        sizeOptions.appendChild(button);
    });
}


// Select color

product.colors.forEach(function (color) {

    const button = document.createElement("button");

    button.className = "color-button";
    button.type = "button";
    button.style.backgroundColor = colorValues[color] || color;
    button.setAttribute("aria-label", color);

    if (color === selectedColor) {
        button.classList.add("active");
    }

    button.addEventListener("click", function () {

        selectedColor = color;

        colorOptions.querySelectorAll("button").forEach(function (item) {
            item.classList.remove("active");
        });

        button.classList.add("active");

        updateGallery();
    });

    colorOptions.appendChild(button);
});


// Add to cart

document.getElementById("add-to-cart")
    .addEventListener("click", function () {

        const cart = JSON.parse(
            localStorage.getItem("silverRavensCart") || "[]"
        );

        const existingProduct = cart.find(function (item) {

            return item.id === product.slug &&
                   item.size === selectedSize &&
                   item.color === selectedColor;
        });

        if (existingProduct) {

            existingProduct.quantity += 1;

        } else {

            cart.push({
                id: product.slug,
                name: product.name,
                price: Number(product.price),
                size: selectedSize,
                color: selectedColor,
                image: product.images[selectedColor][0],
                quantity: 1
            });
        }

        localStorage.setItem(
            "silverRavensCart",
            JSON.stringify(cart)
        );

        window.location.href = cartUrl;
    });

updateGallery();