<x-layout>    
    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-actions">
                <button class="btn-create">Create</button>
                <button class="btn-create-list">Create new list</button>
            </div>

            <nav class="sidebar-lists">
                <h2>Lists</h2>
                <ul>
                    <li class="list-item">
                        <label class="list-name">
                            <input type="radio" name="list">
                            List 1
                        </label>
                    </li>
                    <li class="list-item">
                        <label class="list-name">
                            <input type="radio" name="list">
                            List 2
                        </label>
                    </li>
                    <li class="list-item">
                        <label class="list-name">
                            <input type="radio" name="list">
                            List 3
                        </label>
                    </li>
                    
                </ul>
            </nav>
        </aside>
        
        <main class="content">
            <!-- showing tasks -->
            <x-task-item />

        </main>

        <!-- create task modal -->
        <div class="modal" id="createTaskModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create New Task</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form action="/tasks" method="POST" id="createTaskForm">
                    @csrf
                    <div class="form-group">
                        <label for="taskTitle">Title</label>
                        <input type="text" id="taskTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="taskDescription">Description</label>
                        <textarea id="taskDescription" name="description" rows="4"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-discard">Discard</button>
                        <button type="submit" class="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layout>