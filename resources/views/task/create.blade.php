<x-layout>
    <div class="task-container">
        <h1 class="task-header">Create New task</h1>
        <div>
            <form action="{{ route('task.store') }}" method="POST" class="task">
                @csrf
                <div>
                    <label>Task</label>
                    <input type="text" class="form-control" name="task" id="task" placeholder="Enter the task">
                </div>
                <div>
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Write the description"></textarea>
                </div>
                <div>
                    <label>Status</label>
                    <input type="radio" id="pending" name="status" value="1">
                    <label for="pending">Pending</label>
                    <input type="radio" id="in_progress" name="status" value="2">
                    <label for="in_progress">In Progress</label>
                    <input type="radio" id="completed" name="status" value="3">
                    <label for="completed">Completed</label>
                </div>
                <div>
                    <label>Priority</label>
                    <input type="radio" id="low" name="priority" value="1">
                    <label for="low">Low</label>
                    <input type="radio" id="medium" name="priority" value="2">
                    <label for="medium">Medium</label>
                    <input type="radio" id="high" name="priority" value="3">
                    <label for="high">High</label>
                </div>
                <div>
                    <label>Due Date</label>
                    <input type="date" id="deadline" name="deadline">
                </div>
                <div class="task-buttons">
                    <a href="{{ route('task.index') }}" class="button-3">Cancel</a>
                    <button class="button-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>