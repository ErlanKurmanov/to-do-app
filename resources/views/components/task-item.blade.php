@props(['task'])
<div class="task-item">
    <div class="checkbox-container">
      <div class="custom-checkbox" id="task-checkbox"></div>
    </div>

    <div class="task-content">
      <h1 class="title">{{ $tasks->title }}</h1>
      <p class="description">{{ $tasks->description }}</p>
    </div>
    
    <div class="actions">
      <button class="btn btn-edit">Edit</button>
      <button class="btn btn-delete">Delete</button>
    </div>
  </div>

 