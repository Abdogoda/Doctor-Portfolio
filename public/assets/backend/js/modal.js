const modalTriggerButtons = document.querySelectorAll("[data-modal-target]");
const modals = document.querySelectorAll(".modal");
const modalCloseButtons = document.querySelectorAll(".modal-close");

// Add event listeners to buttons that open the modals
modalTriggerButtons.forEach(elem => {
  elem.addEventListener("click", event => {
    const targetModalId = event.currentTarget.getAttribute("data-modal-target");
    toggleModal(targetModalId);

    // Update the form action for the specific modal
    const actionUrl = event.currentTarget.getAttribute("data-action");
    const modal = document.getElementById(targetModalId);
    const actionForm = modal.querySelector('#actionForm');
    if (actionForm) {
      actionForm.setAttribute('action', actionUrl);
    }
  });
});

// Add event listeners to buttons that close the modals
modalCloseButtons.forEach(elem => {
  elem.addEventListener("click", event => toggleModal(event.currentTarget.closest(".modal").id));
});

// Close modal when clicking outside the modal content
modals.forEach(elem => {
  elem.addEventListener("click", event => {
    if (event.currentTarget === event.target) toggleModal(event.currentTarget.id);
  });
});

// Close modal with "Esc" key
document.addEventListener("keydown", event => {
  if (event.keyCode === 27 && document.querySelector(".modal.modal-show")) {
    toggleModal(document.querySelector(".modal.modal-show").id);
  }
});

// Function to show/hide modal
function toggleModal(modalId) {
  const modal = document.getElementById(modalId);
  if (getComputedStyle(modal).display === "flex") { // If modal is visible
    modal.classList.add("modal-hide");
    setTimeout(() => {
      document.body.style.overflow = "initial";
      modal.classList.remove("modal-show", "modal-hide");
      modal.style.display = "none";
    }, 200);
  } else { // If modal is hidden
    document.body.style.overflow = "hidden";
    modal.style.display = "flex";
    modal.classList.add("modal-show");
  }
}
