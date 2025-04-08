<x-layout>
    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-actions">
                <button class="btn-create">Create</button>
                <button class="btn-create-list">Create new list</button>
            </div>

            <!-- Sidebar -->
            <nav class="sidebar-lists">
                <h2>Lists</h2>
                <ul>
                    <li class="list-item {{ !isset($currentList) ? 'active' : '' }}">
                        <a href="{{ route('list.show') }}" class="list-name">
                            All Tasks
                        </a>
                    </li>
                    @foreach($tasklists as $tasklist)
                        <li class="list-item {{ isset($currentList) && $currentList->id == $tasklist->id ? 'active' : '' }}">
                            <a href="{{ route('list.show', $tasklist->id) }}" class="list-name">
                                {{ $tasklist->name }}
                            </a>
                            <form action="{{ route('list.destroy', $tasklist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete">Delete</button>
                            </form>

                        </li>
                    @endforeach
                </ul>
            </nav>

        </aside>

        <!-- Tasks section -->
        <main class="content">
            <div id="tasks-container">
                @foreach ($tasks as $task)
                    <x-task-item :$task :$tasklists />
                @endforeach
            </div>
        </main>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        <!-- create list modal -->
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
                <form action="{{ route('task.store') }}" method="POST" id="createTaskForm">
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
