<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(is_null(session('lastActivityTime'))){
            session()->regenerate();
            session(['lastActivityTime' => now()]);
            return to_route('task.index')->with('message', 'Session expired, Todo-list reset');
        }else if (now()->diffInMinutes(session('lastActivityTime')) >= (config('session.lifetime')) ) {
            abort(419);
        }

        // return session('lastActivityTime')->diffInMinutes(now());
        // return session()->all();

        session(['lastActivityTime' => now()]);

        $tasks = Task::query()
        ->where('user_session', session()->getId() /*request()->user()->id*/)
        ->orderBy("created_at","desc")
        ->paginate();

        return view("task.index", ["tasks"=> $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(is_null(session('lastActivityTime'))){
            session()->regenerate();
            session(['lastActivityTime' => now()]);
            return to_route('task.index')->with('message', 'Session expired, Todo-list reset');
        }else if (now()->diffInMinutes(session('lastActivityTime')) >= (config('session.lifetime')) ) {
            abort(419);
        }

        session(['lastActivityTime' => now()]);

        return view("task.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session(['lastActivityTime' => now()]);

        $data = $request->validate([
            'task' => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
            'status' => ['required', 'in:1,2,3'],
            'priority' => ['required', 'in:1,2,3'],
            'deadline' => ['nullable', 'date'],
        ]);

        $data['user_session'] = session()->getId(); //$request->user()->id;
        $task = Task::create($data);

        return to_route('task.index')->with('message', 'Task was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if(is_null(session('lastActivityTime'))){
            session()->regenerate();
            session(['lastActivityTime' => now()]);
            return to_route('task.index')->with('message', 'Session expired, Todo-list reset');
        }else if (now()->diffInMinutes(session('lastActivityTime')) >= (config('session.lifetime')) ) {
            abort(419);
        }

        session(['lastActivityTime' => now()]);

        return view("task.show", ["task"=> $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if(is_null(session('lastActivityTime'))){
            session()->regenerate();
            session(['lastActivityTime' => now()]);
            return to_route('task.index')->with('message', 'Session expired, Todo-list reset');
        }else if (now()->diffInMinutes(session('lastActivityTime')) >= (config('session.lifetime')) ) {
            abort(419);
        }

        session(['lastActivityTime' => now()]);

        return view("task.edit", ["task"=> $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        session(['lastActivityTime' => now()]);

        $data = $request->validate([
            'task' => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
            'status' => ['required', 'in:1,2,3'],
            'priority' => ['required', 'in:1,2,3'],
            'deadline' => ['nullable', 'date'],
        ]);

        $task->update($data);

        return to_route('task.show', $task)->with('message', 'Task was updated');
    }

    // update the status of the to do taskw
    public function update_status(Request $request, Task $task)
    {
        session(['lastActivityTime' => now()]);

        $data = $request->validate([
            'status' => ['required', 'in:1,2,3'],
        ]);
        
        $task->update($data);

        return redirect()->back()->with('message', 'Task was updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        session(['lastActivityTime' => now()]);

        $task->delete();

        return to_route('task.index')->with('message', 'Task was deleted');
    }

    // reset the session after a period of inactive (reset todo list)
    public function regenerate(){
        
        session()->regenerate();
        session(['lastActivityTime' => now()]);

        return to_route('task.index')->with('message', 'Session expired, Todo-list reset');
    }
}
