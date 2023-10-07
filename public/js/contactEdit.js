// public/js/modal.js

// Get the modal and overlay elements
var modal = document.getElementById("myModal");
var overlay = document.getElementById("myOverlay");

// Get the open modal button and close modal button
var editModalButton = document.getElementById("editModalButton");
var closeModalBtn = document.getElementById("closeModal");

// Function to open the modal
function openModal() {
    modal.style.display = "block";
    overlay.style.display = "block";
}

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
    overlay.style.display = "none";
}

// Attach a click event listener to open the modal when the button is clicked
editModalButton.addEventListener("click", function () {
    openModal();
});

// Attach a click event listener to close the modal when the close button is clicked
closeModalBtn.addEventListener("click", function () {
    closeModal();
});

// Close the modal if the user clicks anywhere outside the modal content
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        closeModal();
    }
});

// Ensure the modal is initially closed
document.addEventListener("DOMContentLoaded", function () {
    closeModal();
});