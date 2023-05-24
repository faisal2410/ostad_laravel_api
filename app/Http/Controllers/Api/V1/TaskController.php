<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return TaskResource::collection(Task::all());
        // return Task::all();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task= Task::create($request->validated());
       return TaskResource::make( $task );
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return TaskResource::make( $task );
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
          $task->update($request->validated());
        return TaskResource::make( $task );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
          $task->delete();
        return response()->noContent();
    }
}
