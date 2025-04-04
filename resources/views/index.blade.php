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
                            <input type="radio" name="list" value="all" checked>
                            All Tasks
                        </label>
                    </li>
                    @foreach($tasklists as $tasklist)
                        <li class="list-item">
                            <label class="list-name">
                                <input type="radio" name="list" value="{{ $tasklist->id }}">
                                {{ $tasklist->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </nav>



        </aside>


        <!-- Tasks section -->
        <main class="content">
            <div id="tasks-container">
                @foreach ($tasks as $task)
                <div class="task-item" data-task-id="{{ $task->id }}">

                    <div class="checkbox-container">
                        <div class="custom-checkbox {{ $task->completed ? 'checked' : '' }}" id="task-checkbox"></div>
                    </div>
                
                    <div class="task-content {{ $task->completed ? 'checked-task' : '' }}">
                        <h1 class="title">{{ $task->title }}</h1>
                        <p class="description">{{ $task->description }}</p>
                    </div>
                
                    <div class="actions">
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </div>
                </div>
                @endforeach
            </div>
        </main>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        <div class="modal" id="createListModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create New List</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form action="{{ route('lists.store') }}" method="POST" id="createListForm">
                    @csrf
                    <div class="form-group">
                        <label for="listName">List Name</label>
                        <input type="text" id="listName" name="name" required>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-discard">Discard</button>
                        <button type="submit" class="btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>


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
                                <option value="{{ $tasklist->id }}"> {{ $tasklist->name }} </option>
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
