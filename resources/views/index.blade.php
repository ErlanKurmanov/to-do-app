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
            <div class="task">
                <h1 class="title">Title of task</h1>
                <p class="description">This is the body of content area.</p>
            </div>
            <div class="task">
                <h1 class="title">Title of task</h1>
                <p class="description">This is the body of content area.</p>
            </div>
            <div class="task">
                <h1 class="title">Title of task</h1>
                <p class="description">This is the body of content area.</p>
            </div>
        </main>
    </div>
</x-layout>