<?php

namespace App\Repositories;

use App\Models\Tasks;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll()
    {
        $tasks = Tasks::all();
        return $tasks;
    }

    // public function getTaskById($taskId) 
    // {
    //     return Tasks::findOrFail($taskId);
    // }

    // public function deleteTask($taskId) 
    // {
    //     Tasks::destroy($taskId);
    // }

    // public function createTask(array $TaskDetails) 
    // {
    //     return Tasks::create($TaskDetails);
    // }

    // public function updateTask($taskId, array $newDetails) 
    // {
    //     return Tasks::whereId($taskId)->update($newDetails);
    // }
}
