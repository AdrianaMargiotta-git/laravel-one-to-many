<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;

class TaskController extends Controller
{
    //mostrare tutti i task
    public function index(){
        $tasks = Task::all();
        return view('pages.home', compact('tasks'));
    }

    //mostrare un task
    public function show($id){
        $task = Task::findOrFail($id);
        return view ('pages.show', compact('task'));
    }

    //modificare un task
    public function create(){
        $employees = Employee::all();
        return view('pages.create', compact('employees'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'employee_id' => 'required',
        ]);
        $task = new Task;
        $task['title'] = $validate['title'];
        $task['description'] = $validate['description'];
        $task['priority'] = $validate['priority'];
        $task['employee_id'] = $validate['employee_id'];
        $task -> save();
        return redirect() -> route('home');
    }

    //modificare un task
    public function edit($id){
        $task = Task::findOrFail($id);
        $employees = Employee::all();
        return view('pages.edit', compact('task', 'employees'));
    }
    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'employee_id' => 'required',
        ]);
        Task::whereId($id) -> update($validate);
        return redirect() -> route('home');
    }

}
