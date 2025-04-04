
//  -------- Modal for creating a new task ---------

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
  
  // Open Task Modal
  if (createTaskBtn) {
      createTaskBtn.addEventListener('click', function() {
          taskModal.style.display = 'block';
      });
  }
  
  // Open List Modal
  if (createListBtn) {
      createListBtn.addEventListener('click', function() {
          listModal.style.display = 'block';
      });
  }
  
  // Close Task Modal functions
  function closeTaskModal() {
      taskModal.style.display = 'none';
      document.getElementById('createTaskForm').reset();
  }
  
  // Close List Modal functions
  function closeListModal() {
      listModal.style.display = 'none';
      document.getElementById('createListForm').reset();
  }
  
  // Close buttons event listeners
  if (closeTaskBtn) closeTaskBtn.addEventListener('click', closeTaskModal);
  if (discardTaskBtn) discardTaskBtn.addEventListener('click', closeTaskModal);
  if (closeListBtn) closeListBtn.addEventListener('click', closeListModal);
  if (discardListBtn) discardListBtn.addEventListener('click', closeListModal);
  
  // Close modals when clicking outside
  window.addEventListener('click', function(event) {
      if (event.target === taskModal) {
          closeTaskModal();
      }
      if (event.target === listModal) {
          closeListModal();
      }
  });
});





// --------- List filtering functionality -----------

document.addEventListener('DOMContentLoaded', function() {
    // Get all radio buttons for lists
    const listRadios = document.querySelectorAll('input[name="list"]');
    const tasksContainer = document.getElementById('tasks-container');
    
    // Add event listener to each radio button
    listRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            const listId = this.value;
            fetchTasks(listId);
        });
    });
    
    // Function to fetch tasks by list ID
    function fetchTasks(listId) {
        fetch(`/tasks/list/${listId}`)
            .then(response => response.json())
            .then(data => {
                updateTasksDisplay(data.tasks);
            })
            .catch(error => {
                console.error('Error fetching tasks:', error);
            });
            
    }
    
    // Function to update the tasks display
    function updateTasksDisplay(tasks) {
        // Clear current tasks
        tasksContainer.innerHTML = '';
        
        // If no tasks, show a message
        if (tasks.length === 0) {
            tasksContainer.innerHTML = '<p>No tasks in this list</p>';
            return;
        }
        
        // Create and append task items
        tasks.forEach(task => {
            const taskItem = createTaskItem(task);
            tasksContainer.appendChild(taskItem);
        });
    }
    
    // Function to create a task item element
    function createTaskItem(task) {
        const taskItem = document.createElement('div');
        taskItem.className = 'task-item';
        taskItem.innerHTML = `
        <div class="task-item" data-task-id="${task.id}">
            <div class="checkbox-container">
                <div class="custom-checkbox ${task.completed ? 'checked' : ''}" id="task-checkbox""></div>
            </div>
            
            <div class="task-content">
                <h1 class="title">${task.title}</h1>
                <p class="description">${task.description}</p>
            </div>
            
            <div class="actions">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </div>
        `;
        return taskItem;
    }
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
            method: 'PATCH',
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
    
    // Handle edit buttons
    if (e.target.closest('.btn-edit')) {
        alert('Edit functionality would open here');
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