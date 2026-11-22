const featuredGrid = document.getElementById("featured-grid");
const prevButton = document.getElementById("prev-product");
const nextButton = document.getElementById("next-product");

if (featuredGrid) {

    const cards = Array.from(featuredGrid.children);

    let currentIndex = 0;

    function showProducts() {

        featuredGrid.replaceChildren();

        const visibleCount = Math.min(3, cards.length);

        for (let i = 0; i < visibleCount; i++) {

            const index = (currentIndex + i) % cards.length;

            featuredGrid.appendChild(cards[index]);
        }
    }

    nextButton.addEventListener("click", function () {

        currentIndex = (currentIndex + 1) % cards.length;

        showProducts();
    });

    prevButton.addEventListener("click", function () {

        currentIndex =
            (currentIndex - 1 + cards.length) % cards.length;

        showProducts();
    });

    if (cards.length < 2) {
        prevButton.disabled = true;
        nextButton.disabled = true;
    }

    showProducts();
}