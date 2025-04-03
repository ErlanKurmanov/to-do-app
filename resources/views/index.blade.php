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
                            work
                        </label>
                    </li>
                    <li class="list-item">
                        <label class="list-name">
                            <input type="radio" name="list">
                            grocaries
                        </label>
                    </li>
                    <li class="list-item">
                        <label class="list-name">
                            <input type="radio" name="list">
                            personal
                        </label>
                    </li>
                    
                </ul>
            </nav>
        </aside>


        <!-- Tasks section -->
        <main class="content">
            @foreach ($tasks as $task)
                <x-task-item :$task/>
            @endforeach
            

        </main>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- create task modal -->
        <div class="modal" id="createTaskModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create New Task</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form action="{{ route('tasks.store') }}" method="POST" id="createTaskForm">
                    @csrf
                    <div class="form-group">
                        <label for="taskTitle">Title</label>
                        <input type="text" id="taskTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="taskDescription">Description</label>
                        <textarea id="taskDescription" name="description" rows="4"></textarea>
                    </div>
                    <div class="task-list-dropdown">
                        <label for="taskList">Choose a category of task:</label>
                        <select name="list_id" required>
                            @foreach($tasklists as $tasklist)
                                <option value="{{ $tasklist->id }}">{{ $tasklist->name }}</option>
                            @endforeach
                        </select>
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