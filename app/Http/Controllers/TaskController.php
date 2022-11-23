<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * show all task
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::select('*')
            ->orderBy('display_order')
            ->get();
        return view('index2')->with(['tasks' => $tasks]);
    }
}
