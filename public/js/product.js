const productData = {
    tshirt: {
        breadcrumb: "T-Shirt",
        description: "Premium quality T-shirt featuring the official Silver Ravens logo. Comfortable, stylish and perfect for everyday wear.",
        sizes: ["S", "M", "L", "XL"],
        colors: {
            Black: {
                hex: "#000000",
                images: [
                    "SILVER-RAVENS-TSHIRT-BLACK-FRONT.png",
                    "SILVER-RAVENS-TSHIRT-BLACK-BACK.png"
                ]
            },
            White: {
                hex: "#FFFFFF",
                images: [
                    "SILVER-RAVENS-TSHIRT-WHITE-FRONT.png",
                    "SILVER-RAVENS-TSHIRT-WHITE-BACK.png"
                ]
            },
            Purple: {
                hex: "#682A95",
                images: [
                    "SILVER-RAVENS-TSHIRT-PURPLE-FRONT.png",
                    "SILVER-RAVENS-TSHIRT-PURPLE-BACK.png"
                ]
            }
        }
    },

    hoodie: {
        breadcrumb: "Hoodie",
        description: "Premium quality hoodie featuring the official Silver Ravens logo. Comfortable, warm and perfect for everyday wear.",
        sizes: ["S", "M", "L", "XL"],
        colors: {
            Black: {
                hex: "#000000",
                images: [
                    "SILVER-RAVENS-HOODIE-FRONT.png",
                    "SILVER-RAVENS-HOODIE-BACK.png"
                ]
            }
        }
    },

    cap: {
        breadcrumb: "Cap",
        description: "Official Silver Ravens cap featuring our signature logo. Lightweight, comfortable and perfect for everyday wear.",
        sizes: ["ONE SIZE"],
        colors: {
            Black: {
                hex: "#000000",
                images: ["SILVER-RAVENS-CAP.png"]
            }
        }
    },

    mug: {
        breadcrumb: "Mug",
        description: "Official Silver Ravens mug featuring our signature team logo.",
        sizes: ["ONE SIZE"],
        colors: {
            Black: {
                hex: "#000000",
                images: ["SILVER-RAVENS-MUG.png"]
            }
        }
    },

    mousepad: {
        breadcrumb: "Mousepad",
        description: "Premium Silver Ravens gaming mousepad with a smooth surface for precise mouse control. Durable and designed for gamers.",
        sizes: ["STANDARD"],
        colors: {
            Black: {
                hex: "#000000",
                images: ["SILVER-RAVENS-MOUSEPAD.png"]
            }
        }
    },

    mouse: {
        breadcrumb: "Mouse",
        description: "High-performance Silver Ravens gaming mouse. Designed for precision, speed and comfort.",
        sizes: [],
        colors: {
            White: {
                hex: "#FFFFFF",
                images: ["SILVER-RAVENS-MOUSE.png"]
            }
        }
    }
};


// Get selected product

const params = new URLSearchParams(window.location.search);
const productId = params.get("id") || "tshirt";

const selectedProduct = products.find(function (product) {
    return product.id === productId;
});

const details = productData[productId];


// Product elements

const productName = document.getElementById("product-name");
const productPrice = document.getElementById("product-price");
const productDescription = document.getElementById("product-description");

const mainImage = document.getElementById("main-product-image");
const thumbnails = document.getElementById("product-thumbnails");

const sizeOptions = document.getElementById("size-options");
const colorOptions = document.getElementById("color-options");

const addToCartButton = document.getElementById("add-to-cart");


if (selectedProduct && details) {

    let selectedSize = details.sizes.includes("M")
        ? "M"
        : details.sizes[0] || "";

    let selectedColor = Object.keys(details.colors)[0];


    // Display product information

    productName.textContent = selectedProduct.name;

    productPrice.textContent =
        "$" + selectedProduct.price.toFixed(2);

    productDescription.textContent = details.description;

    document.getElementById("breadcrumb-product").textContent =
        details.breadcrumb;

    document.title = selectedProduct.name + " | The Silver Ravens";


    // Product gallery

    function updateGallery() {

        const images = details.colors[selectedColor].images;

        mainImage.src = "assets/images/" + images[0];
        mainImage.alt = selectedProduct.name;

        thumbnails.innerHTML = "";

        images.forEach(function (image, index) {

            const button = document.createElement("button");

            button.className = "thumbnail-button";

            if (index === 0) {
                button.classList.add("active");
            }

            button.setAttribute(
                "aria-label",
                "View product image " + (index + 1)
            );

            const img = document.createElement("img");

            img.src = "assets/images/" + image;
            img.alt = selectedProduct.name;

            button.appendChild(img);

            button.addEventListener("click", function () {

                mainImage.src = "assets/images/" + image;

                document.querySelectorAll(".thumbnail-button")
                    .forEach(function (item) {
                        item.classList.remove("active");
                    });

                button.classList.add("active");
            });

            thumbnails.appendChild(button);
        });
    }


    // Size selection

    if (details.sizes.length === 0) {

        document.getElementById("size-section").style.display = "none";

    } else {

        details.sizes.forEach(function (size) {

            const button = document.createElement("button");

            button.className = "size-button";
            button.textContent = size;

            if (size === selectedSize) {
                button.classList.add("active");
            }

            button.addEventListener("click", function () {

                selectedSize = size;

                document.querySelectorAll(".size-button")
                    .forEach(function (item) {
                        item.classList.remove("active");
                    });

                button.classList.add("active");
            });

            sizeOptions.appendChild(button);
        });
    }


    // Color selection

    Object.keys(details.colors).forEach(function (color) {

        const button = document.createElement("button");

        button.className = "color-button";
        button.style.backgroundColor = details.colors[color].hex;

        button.setAttribute("aria-label", color);

        if (color === selectedColor) {
            button.classList.add("active");
        }

        button.addEventListener("click", function () {

            selectedColor = color;

            document.querySelectorAll(".color-button")
                .forEach(function (item) {
                    item.classList.remove("active");
                });

            button.classList.add("active");

            updateGallery();
        });

        colorOptions.appendChild(button);
    });


    // Add product to shopping cart

    addToCartButton.addEventListener("click", function () {

        const cart = JSON.parse(
            localStorage.getItem("silverRavensCart") || "[]"
        );

        const existingProduct = cart.find(function (item) {

            return item.id === selectedProduct.id &&
                   item.size === selectedSize &&
                   item.color === selectedColor;
        });

        if (existingProduct) {

            existingProduct.quantity += 1;

        } else {

            cart.push({
                id: selectedProduct.id,
                name: selectedProduct.name,
                price: selectedProduct.price,
                size: selectedSize,
                color: selectedColor,
                image: details.colors[selectedColor].images[0],
                quantity: 1
            });
        }

        localStorage.setItem(
            "silverRavensCart",
            JSON.stringify(cart)
        );

        window.location.href = "cart.html";
    });

    updateGallery();

} else {

    window.location.href = "shop.html";
}