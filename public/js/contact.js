const contactForm = document.getElementById("contact-form");
const formStatus = document.getElementById("form-status");

contactForm.addEventListener("submit", function (event) {

    event.preventDefault();

    formStatus.textContent =
        "Form validated successfully. Message delivery will be available soon.";

});