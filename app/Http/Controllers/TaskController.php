<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Resources\TaskCollection;
use App\Http\Requests\TasksRequest;
// use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{

    // private TaskRepositoryInterface $taskRepository;

    // public function __construct(TaskRepositoryInterface $taskRepository) 
    // {
    //     $this->taskRepository = $taskRepository;
    // }


    public function index(Request $request)
    {
        $tasks = Tasks::query();

        if ($request->has('search')) {
            $tasks->where('title', 'LIKE', '%' . $request->search . '%');
        }
        if ($request->has('type')) {
            $tasks->where('type', 'LIKE', '%' . $request->type . '%');
        }
        if ($request->has('status')) {
            $tasks->where('status', 'LIKE', '%' . $request->status . '%');
        }

        // $tasks = $this->taskRepository->getAllTasks();


        return new TaskCollection($tasks->get());
    }

    public function create(): Response
    {
        //
    }

    public function store(TasksRequest $request): RedirectResponse
    {
        $input = $request->all();
        $task = Tasks::create($input);
        return new TaskCollection($task->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Tasks::where('id', $id)->delete();
        if ($task) {
            return response()->json([
                "success" => true,
                "message" => "User retrieved successfully.",
                "data" => $task
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "",
            ]);
        }
    }
}
