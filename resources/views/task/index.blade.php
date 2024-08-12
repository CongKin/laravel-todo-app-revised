<x-layout>
    <div class="task-container">
        <a href="{{ route('task.create')}}" class="button-1">
            New Task
        </a>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ Str::words($task->task, 30)}}</td>
                        <td>
                            @if($task->status == '1')
                                Pending
                            @elseif($task->status == '2')
                                In Progress
                            @else
                                Completed
                            @endif
                        </td>
                        <td>
                            @if($task->priority == '1')
                                Low
                            @elseif($task->priority == '2')
                                Medium
                            @else
                                High
                            @endif
                        </td>
                        <td>{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : 'No deadline' }}</td>
                        <td>{{ $task->created_at->format('Y-m-d') }}</td>
                        <td>
                            <form action="{{ route('task.update_status', $task) }}" method="POST" class="task">
                                @csrf
                                @method('PUT')
                                @if($task->status == '1')
                                    <button type="submit" name="status" value="2" class="button-61">Start</button>
                                @elseif($task->status == '2')
                                    <button type="submit" name="status" value="3" class="button-61">Complete</button>
                                    <button type="submit" name="status" value="1" class="button-61">Pending</button>
                                @elseif($task->status == '3')
                                    <button type="submit" name="status" value="2" class="button-61">Reset</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('task.show', $task) }}" class="button-2">View</a>
                            <a href="{{ route('task.edit', $task) }}" class="button-2">Edit</a>
                            <form action="{{ route('task.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-6">
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>