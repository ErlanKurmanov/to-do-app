 // -----------------Modal functionality----------------
 document.addEventListener('DOMContentLoaded', function() {
    // Task Modal Elements
    const taskModal = document.getElementById('createTaskModal');
    const createTaskBtn = document.querySelector('.btn-create');
    const closeTaskBtn = document.querySelector('#createTaskModal .close-modal');
    const discardTaskBtn = document.querySelector('#createTaskModal .btn-discard');

    // List Modal Elements
    const listModal = document.getElementById('createListModal');
    const createListBtn = document.querySelector('.btn-create-list');
    const closeListBtn = document.querySelector('#createListModal .close-modal');
    const discardListBtn = document.querySelector('#createListModal .btn-discard');

    // Edit Task Modal Elements
    const editTaskModal = document.getElementById('editTaskModal');
    const editTaskForm = document.getElementById('editTaskForm');
    const closeEditTaskBtn = document.querySelector('#editTaskModal .close-modal');
    const discardEditTaskBtn = document.querySelector('#editTaskModal .btn-discard');
    const editTaskButtons = document.querySelectorAll('.btn-edit-task'); // Select all edit buttons

    // Open Create Task Modal
    if (createTaskBtn) {
        createTaskBtn.addEventListener('click', function() {
            taskModal.style.display = 'block';
        });
    }

    // Open Create List Modal
    if (createListBtn) {
        createListBtn.addEventListener('click', function() {
            listModal.style.display = 'block';
        });
    }

    // Open Edit Task Modal with data
    editTaskButtons.forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            const taskItem = document.querySelector(`.task-item[data-task-id="${taskId}"]`);

            if (taskItem) {
                const taskTitle = taskItem.querySelector('.title').textContent;
                const taskDescription = taskItem.querySelector('.description').textContent;

                // Set modal input values
                document.getElementById('editTaskTitle').value = taskTitle;
                document.getElementById('editTaskDescription').value = taskDescription;
                editTaskForm.action = `/task/${taskId}`; // Update the form action dynamically

                editTaskModal.style.display = 'block';
            }
        });
    });

    // Close Task Modal function
    function closeTaskModal() {
        taskModal.style.display = 'none';
        document.getElementById('createTaskForm').reset();
    }

    // Close List Modal function
    function closeListModal() {
        listModal.style.display = 'none';
        document.getElementById('createListForm').reset();
    }

    // Close Edit Task Modal function
    function closeEditTaskModal() {
        editTaskModal.style.display = 'none';
        editTaskForm.reset();
    }

    // Close buttons event listeners
    if (closeTaskBtn) closeTaskBtn.addEventListener('click', closeTaskModal);
    if (discardTaskBtn) discardTaskBtn.addEventListener('click', closeTaskModal);
    if (closeListBtn) closeListBtn.addEventListener('click', closeListModal);
    if (discardListBtn) discardListBtn.addEventListener('click', closeListModal);
    if (closeEditTaskBtn) closeEditTaskBtn.addEventListener('click', closeEditTaskModal);
    if (discardEditTaskBtn) discardEditTaskBtn.addEventListener('click', closeEditTaskModal);

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === taskModal) closeTaskModal();
        if (event.target === listModal) closeListModal();
        if (event.target === editTaskModal) closeEditTaskModal();
    });
});





// -----------------Task item functionality----------------
// Task item functionality - use event delegation for dynamically created elements
document.addEventListener('click', function(e) {
    // Handle checkboxes
    if (e.target.closest('.custom-checkbox')) {
        const checkbox = e.target.closest('.custom-checkbox');
        const taskItem = checkbox.closest('.task-item');
        const content = taskItem.querySelector('.task-content');
        const taskId = taskItem.dataset.taskId;

        // Toggle visual state
        checkbox.classList.toggle('checked');
        content.classList.toggle('checked-task');

        // Get the new completed state (true if class is present)
        const isCompleted = checkbox.classList.contains('checked');

        // Send AJAX request to update task status
        fetch(`/tasks/${taskId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            //it converts the isCompleted value to JSON
            body: JSON.stringify({
                completed: isCompleted
            })
        })
        //response is an object, .json() converts it to a json format
        .then(response => response.json())
        //data is an object
        .then(data => {
            if (!data.success) {
                // Revert UI if update failed
                checkbox.classList.toggle('checked');
                content.classList.toggle('checked-task');
                console.error('Failed to update task status:', data.message);
            }
        })
        .catch(error => {
            // Revert UI on error
            checkbox.classList.toggle('checked');
            content.classList.toggle('checked-task');
            console.error('Error updating task status:', error);
        });
    }



    // Handle delete buttons
    if (e.target.closest('.btn-delete')) {
        const taskItem = e.target.closest('.task-item');
        taskItem.style.opacity = '0';
        setTimeout(() => {
            alert('Task would be deleted from database');
            taskItem.style.opacity = '1';
        }, 300);
    }
});
