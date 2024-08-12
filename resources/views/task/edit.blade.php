<x-layout>
    <div class="task-container">
        <h1 class="task-header">Edit Task {{ $task->created_at->format('Y-m-d')}}</h1>
        <div>
            <form action="{{ route('task.update', $task) }}" method="POST" class="task">
                @csrf
                @method('PUT')
                <div>
                    <label>Task</label>
                    <input type="text" class="form-control" name="task" id="task" placeholder="Enter the task" value="{{ old('task', $task->task ?? '') }}">
                </div>
                <div>
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Write the description">{{ old('description', $task->description ?? '') }}</textarea>
                </div>
                <div>
                    <label>Status</label>
                    <input type="radio" id="pending" name="status" value="1" {{ old('status', $task->status ?? '') == '1' ? 'checked' : '' }}>
                    <label for="pending">Pending</label>
                    <input type="radio" id="in_progress" name="status" value="2" {{ old('status', $task->status ?? '') == '2' ? 'checked' : '' }}>
                    <label for="in_progress">In Progress</label>
                    <input type="radio" id="completed" name="status" value="3" {{ old('status', $task->status ?? '') == '3' ? 'checked' : '' }}>
                    <label for="completed">Completed</label>
                </div>
                <div>
                    <label>Priority</label>
                    <input type="radio" id="low" name="priority" value="1" {{ old('priority', $task->priority ?? '') == '1' ? 'checked' : '' }}>
                    <label for="low">Low</label>
                    <input type="radio" id="medium" name="priority" value="2" {{ old('priority', $task->priority ?? '') == '2' ? 'checked' : '' }}>
                    <label for="medium">Medium</label>
                    <input type="radio" id="high" name="priority" value="3" {{ old('priority', $task->priority ?? '') == '3' ? 'checked' : '' }}>
                    <label for="high">High</label>
                </div>
                <div>
                    <label>Due Date</label>
                    <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}">
                </div>
                <div class="task-buttons">
                    <a href="{{ route('task.show', $task) }}" class="button-3">Cancel</a>
                    <button class="button-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
