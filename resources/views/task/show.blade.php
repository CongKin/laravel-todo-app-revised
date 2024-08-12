<x-layout>
    <div class="task-container">
        <h1 class="task-header">Task {{ $task->created_at->format('Y-m-d')}}</h1>
        <div class="task-buttons">
            <a href="{{ route('task.index') }}" class="button-3">Back</a>
            <form action="{{ route('task.update_status', $task) }}" method="POST" class="task">
                @csrf
                @method('PUT')
                @if($task->status == '1')
                    <button type="submit" name="status" value="2" class="button-61">Start Task</button>
                @elseif($task->status == '2')
                    <button type="submit" name="status" value="3" class="button-61">Complete Task</button>
                    <button type="submit" name="status" value="1" class="button-61">Set to Pending</button>
                @elseif($task->status == '3')
                    <button type="submit" name="status" value="2" class="button-61">Reopen Task</button>
                @endif
            </form>
            <a href="{{ route('task.edit', $task) }}" class="button-2">Edit</a>
            <form action="{{ route('task.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="button-3">Delete</button>
            </form>
        </div>
        <div>
            <div>
                <p><strong>Task:</strong></p>
                <p>{{ $task->task }}</p>
            </div>
            <div>
                <p><strong>Description:</strong></p>
                <p>{{ $task->description }}</p>
            </div>
            <div>
                <p><strong>Status:</strong></p>
                <p>
                    @if($task->status == '1')
                        Pending
                    @elseif($task->status == '2')
                        In Progress
                    @else
                        Completed
                    @endif
                </p>
            </div>
            <div>
                <p><strong>Priority:</strong></p>
                <p>
                    @if($task->priority == '1')
                        Low
                    @elseif($task->priority == '2')
                        Medium
                    @else
                        High
                    @endif
                </p>
            </div>
            <div>
                <p><strong>Due Date:</strong></p>
                <p>{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : 'No deadline' }}</p>
            </div>
        </div>
    </div>
</x-layout>