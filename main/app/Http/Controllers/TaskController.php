<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('pages.home', compact('tasks'));
    }
}
