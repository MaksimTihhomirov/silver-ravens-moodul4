const products = [
    {
        id: "tshirt",
        name: "SILVER RAVENS T-SHIRT",
        price: 29.99,
        category: "clothing",
        image: "SILVER-RAVENS-TSHIRT-BLACK-FRONT.png"
    },
    {
        id: "hoodie",
        name: "SILVER RAVENS HOODIE",
        price: 49.99,
        category: "clothing",
        image: "SILVER-RAVENS-HOODIE-FRONT.png"
    },
    {
        id: "cap",
        name: "SILVER RAVENS CAP",
        price: 22.99,
        category: "accessories",
        image: "SILVER-RAVENS-CAP.png"
    },
    {
        id: "mug",
        name: "SILVER RAVENS MUG",
        price: 9.99,
        category: "accessories",
        image: "SILVER-RAVENS-MUG.png"
    },
    {
        id: "mousepad",
        name: "SILVER RAVENS MOUSEPAD",
        price: 19.99,
        category: "gaming",
        image: "SILVER-RAVENS-MOUSEPAD.png"
    },
    {
        id: "mouse",
        name: "SILVER RAVENS MOUSE",
        price: 39.99,
        category: "gaming",
        image: "SILVER-RAVENS-MOUSE.png"
    }
];


// Create product card

function createProductCard(product) {
    return `
        <a href="product.html?id=${product.id}" class="product-card">

            <img src="assets/images/${product.image}"
                 alt="${product.name}">

            <h3>${product.name}</h3>

            <p class="product-price">
                $${product.price.toFixed(2)}
            </p>

        </a>
    `;
}


// Home page slider

const featuredGrid = document.getElementById("featured-grid");
const prevButton = document.getElementById("prev-product");
const nextButton = document.getElementById("next-product");

let currentIndex = 0;

function showProducts() {

    featuredGrid.innerHTML = "";

    for (let i = 0; i < 3; i++) {

        const index = (currentIndex + i) % products.length;

        featuredGrid.innerHTML += createProductCard(products[index]);
    }
}

if (featuredGrid) {

    showProducts();

    nextButton.addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % products.length;
        showProducts();
    });

    prevButton.addEventListener("click", function () {
        currentIndex =
            (currentIndex - 1 + products.length) % products.length;

        showProducts();
    });
}


// Shop page

const shopGrid = document.getElementById("shop-grid");
const categoryFilter = document.getElementById("category-filter");
const priceSort = document.getElementById("price-sort");

function displayShopProducts() {

    let filteredProducts = [...products];

    const category = categoryFilter.value;
    const sort = priceSort.value;

    if (category !== "all") {
        filteredProducts = filteredProducts.filter(function (product) {
            return product.category === category;
        });
    }

    if (sort === "low") {
        filteredProducts.sort(function (a, b) {
            return a.price - b.price;
        });
    }

    if (sort === "high") {
        filteredProducts.sort(function (a, b) {
            return b.price - a.price;
        });
    }

    shopGrid.innerHTML = "";

    filteredProducts.forEach(function (product) {
        shopGrid.innerHTML += createProductCard(product);
    });
}

if (shopGrid) {

    displayShopProducts();

    categoryFilter.addEventListener("change", displayShopProducts);
    priceSort.addEventListener("change", displayShopProducts);
}