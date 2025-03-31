document.addEventListener('DOMContentLoaded', function() {
    // Get modal elements
    const modal = document.getElementById('createTaskModal');
    const createBtn = document.querySelector('.btn-create');
    const closeBtn = document.querySelector('.close-modal');
    const discardBtn = document.querySelector('.btn-discard');
    
    // Open modal when Create button is clicked
    createBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });
    
    // Close modal functions
    function closeModal() {
        modal.style.display = 'none';
        document.getElementById('createTaskForm').reset();
    }
    
    // Close modal when X is clicked
    closeBtn.addEventListener('click', closeModal);
    
    // Close modal when Discard button is clicked
    discardBtn.addEventListener('click', closeModal);
    
    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});
