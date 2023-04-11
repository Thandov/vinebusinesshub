
function showModal() {
    // Get the modal backdrop element
    const modalBackdrop = document.createElement('div');
    modalBackdrop.classList.add('modal-backdrop');

    // Get the modal container element
    const modalContainer = document.createElement('div');
    modalContainer.classList.add('modal-container');

    // Create the modal content
    const modalContent = document.createElement('div');
    modalContent.innerHTML = `
    <h2>Modal Title</h2>
    <p>Modal content goes here.</p>
    <button class="modal-close">&times;</button>
  `;

    // Append the modal content to the modal container
    modalContainer.appendChild(modalContent);

    // Append the modal container to the modal backdrop
    modalBackdrop.appendChild(modalContainer);

    // Add event listener to close the modal
    const closeButton = modalContainer.querySelector('.modal-close');
    closeButton.addEventListener('click', () => {
        document.body.removeChild(modalBackdrop);
    });

    // Add the modal backdrop to the document body
    document.body.appendChild(modalBackdrop);
}
const modalTrigger = document.getElementById('modal-trigger');
const modalOverlay = document.getElementById('modal-overlay');
const modalBody = document.getElementById('modal-body');
const modalClose = document.getElementById('modal-close');

modalTrigger.addEventListener('click', () => {
    modalOverlay.classList.remove('hidden');
    modalBody.classList.remove('hidden');
});

modalClose.addEventListener('click', () => {
    modalOverlay.classList.add('hidden');
    modalBody.classList.add('hidden');
});
