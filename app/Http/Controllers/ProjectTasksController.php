<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $attribute = request()->validate([
            'description' => 'required'
        ]);

        $project->addTask($attribute);

        return back();
    }

    public function update(Task $task)
    {
        if (request()->has('completed')) {
            $task->complete();

        } else {
            $task->incomplete();

        }

        $method = request()->has('complete') ? 'complete' : 'incomplete';

        $task->$method();

        return back();
    }
}
