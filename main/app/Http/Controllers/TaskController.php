<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;
use App\Typology;

class TaskController extends Controller
{
/********************TASK********************/    
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
        $typologies = Typology::all();
        return view('pages.create', compact('employees', 'typologies'));
    }
    public function store(Request $request){
        // $validate = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'priority' => 'required',
        //     'employee_id' => 'required',
        // ]);
        // $task = new Task;
        // $task['title'] = $validate['title'];
        // $task['description'] = $validate['description'];
        // $task['priority'] = $validate['priority'];
        // $task['employee_id'] = $validate['employee_id'];
        // $task -> save();
        // return redirect() -> route('home');
        $data = $request -> all();
        $employee = Employee::findOrFail($data['employee_id']);
        $task = Task::make($request -> all());
        $task -> employee() -> associate($employee);
        $task -> save();

        $typologies = Typology::findOrFail($data['typologies']);
        $task -> typologies() -> attach($typologies);

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

    //eliminare un task
    public function delete($id){
        $task = Task::findOrFail($id);
        $task -> delete();
        return redirect() -> route('home');
    }

/********************TIPOLOGY********************/
    public function typologies_index(){
        $typologies = Typology::all();
        return view('pages.typologies-index', compact('typologies'));
    }
    public function typologies_show($id){
        $typology = Typology::findOrFail($id);
        return view('pages.typologies-show', compact('typology'));
    }

/********************EMPLOYEE********************/
    public function employees_index() {
        $employees = Employee::all();
        return view('pages.employee-index', compact('employees'));
    }

    public function employees_show($id) {
        $employee = Employee::findOrFail($id);
        return view('pages.employee-show', compact('employee'));
    }

}
