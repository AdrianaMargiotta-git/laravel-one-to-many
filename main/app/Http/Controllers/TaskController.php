<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Task;
use App\Employee;
use App\Typology;

use Illuminate\Support\Facades\Validator;

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

    //craere un task
    public function create(){
        $employees = Employee::all();
        $typologies = Typology::all();
        return view('pages.create', compact('employees', 'typologies'));
    }
    public function store(Request $request){
        $data = $request -> all();

        Validator::make($data, [
            'title' => 'required|min:4|max:40',
            'description' => 'required|min:4|max:260',
            'priority' => 'required|integer|min:1|max:5',
        ]) -> validate();

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
        $employees = Employee::all();
        $typologies = Typology::all();
        $task = Task::findOrFail($id);
        return view('pages.edit', compact('employees', 'typologies', 'task'));
    }
    public function update(Request $request, $id){
        $data = $request -> all();

        Validator::make($data, [
            'title' => 'required|min:4|max:40',
            'description' => 'required|min:4|max:260',
            'priority' => 'required|integer|min:1|max:5',
        ]) -> validate();

        $employee = Employee::findOrFail($data['employee_id']);
        $task = Task::findOrFail($id);
        $task -> update($data);
        $task -> employee() -> associate($employee);
        $task -> save();

        return redirect() -> route('home');
    }

    //eliminare un task
    public function delete($id){
        $task = Task::findOrFail($id);
        $task -> delete();
        return redirect() -> route('home');
    }

/********************TIPOLOGY********************/
    //mostrare una e più tipology
    public function typologies_index(){
        $typologies = Typology::all();
        return view('pages.typologies-index', compact('typologies'));
    }
    public function typologies_show($id){
        $typology = Typology::findOrFail($id);
        return view('pages.typologies-show', compact('typology'));
    }

    //craere una tipology
    public function typologies_create(){
        return view('pages.typologies-create');
    }
    public function typologies_store(Request $request){
        
        Validator::make($request -> all(), [
            'name' => 'required|min:4|max:60',
            'description' => 'required|min:4|max:260',
        ]) -> validate();

        $typologies = Typology::create($request -> all());
        $task -> typologies() -> attach($typologies);
        return redirect() -> route('typologies-show', $typology -> id);
    }

    //modificare una tipology
    public function typologies_edit($id){
        $typology = Typology::findOrFail($id);
        $tasks = Task::all();
        return view('pages.typologies-edit', compact('typology', 'tasks'));
    }
    public function typologies_update(Request $request, $id){

        Validator::make($request -> all(), [
            'name' => 'required|min:4|max:60',
            'description' => 'required|min:4|max:260',
        ]) -> validate();

        $typology = Typology::findOrFail($id);
        if (array_key_exists('taskassociate', $request -> all())) {
            $tasksList = Task::findOrFail($request['taskassociate']);
            $typology -> tasks() -> sync($tasksList);
        } else {
            $typology -> tasks() -> detach();
        }
        $typology -> update($request -> all());
        return redirect() -> route('typologies-show', $typology -> id);
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
