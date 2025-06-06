<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $tasks= $request->user()->tasks;

        // dd($tasks);
        
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $task = new Task;
        $task->name = $request->name;
        $request->User()->tasks()->save($task);
        return redirect()->back();

        // $request->User()->tasks()->create([
        //     'name' => $request->name
        // ]);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Task $task)
    {

        // if($request->user()->can('delete', $task)){
            
        //     $task->delete();
        //     return redirect()->back();
        // }else{
        //     abort(403, 'You do not own this task.');
        // }

        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->back();
       
    }
}
