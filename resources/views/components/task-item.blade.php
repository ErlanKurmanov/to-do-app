@props(['task'])
<div class="task-item" data-task-id="{{ $task->id }}">

    <div class="checkbox-container">
        <div class="custom-checkbox {{ $task->completed ? 'checked' : '' }}" id="task-checkbox"></div>
    </div>

    <div class="task-content {{ $task->completed ? 'checked-task' : '' }}">
        <h1 class="title">{{ $task->title }}</h1>
        <p class="description">{{ $task->description }}</p>
    </div>

    <div class="actions">
            <button class="btn-edit-task" data-task-id="{{ $task->id}}">Edit</button>

{{--         Deletes task--}}
        <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
            <button class="btn btn-delete">Delete</button>
        </form>

    </div>
</div>

<!-- Edit Task Modal -->
<div class="modal" id="editTaskModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edit Task</h2>
            <span class="close-modal">&times;</span>
        </div>
        <form action="{{route('task.update', [$task->id])}}" method="POST" id="editTaskForm">
            @csrf
            <div class="form-group">
                <label for="editTaskTitle">Title</label>
                <input type="text" id="editTaskTitle" name="title" required></input>
            </div>
            <div class="form-group">
                <label for="editTaskDescription">Description</label>
                <textarea id="editTaskDescription" name="description" rows="4"></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-discard">Discard</button>
                <button type="submit" class="btn-save">Save</button>
            </div>
        </form>
    </div>
</div>
