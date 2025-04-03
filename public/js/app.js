
//  -------- Modal for creating a new task ---------
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







// -----------------Task item functionality----------------
 // Toggle checkbox state
 const checkbox = document.getElementById('task-checkbox');
 const taskItem = document.querySelector('.task-item');
 const content = document.querySelector('.content');
 
 checkbox.addEventListener('click', function() {
   this.classList.toggle('checked');
   content.classList.toggle('checked-task');
 });
 
 // Edit button functionality (simple alert for demonstration)
 const editBtn = document.querySelector('.btn-edit');
 editBtn.addEventListener('click', function() {
   alert('Edit functionality would open here');
 });
 
 // Delete button functionality (simple animation for demonstration)
 const deleteBtn = document.querySelector('.btn-delete');
 deleteBtn.addEventListener('click', function() {
   taskItem.style.opacity = '0';
   setTimeout(() => {
     alert('Task would be deleted from database');
     taskItem.style.opacity = '1';
   }, 300);
 });

