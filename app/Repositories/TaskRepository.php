<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Tasks;

class TaskRepository implements TaskRepositoryInterface 
{
    public function getAllTasks() 
    {
        return Tasks::all();
    }

    // public function getTaskById($taskId) 
    // {
    //     return Task::findOrFail($taskId);
    // }

    // public function deleteTask($taskId) 
    // {
    //     Task::destroy($taskId);
    // }

    // public function createTask(array $TaskDetails) 
    // {
    //     return Task::create($TaskDetails);
    // }

    // public function updateTask($taskId, array $newDetails) 
    // {
    //     return Task::whereId($taskId)->update($newDetails);
    // }
}