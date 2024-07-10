<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Dotenv\Exception\ValidationException;
use Session;


class TodoController extends Controller
{
    public function index(){
        if ($value = Session::get('id') != 0){
        $todo = Todo::getTodos();
        return view('index')->with('todos', $todo);
    }
    else{
        return redirect('login');
    }
     }

    public function create(){
        return view('create');
    }
    public function details(Todo $todo){

        return view('details')->with('todos', $todo);
    
    }
    
    public function edit(Todo $todo){
    
        return view('edit')->with('todos',$todo);
    
    }
    public function update(Todo $todo){


        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
                
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        // $todo->checked = $data['checked'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }
    public function delete(Todo $todo){

        $todo->delete();

        return redirect('/');

    }

    public function store(){

        $value = Session::get('id');
       
       try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
                // 'checked'=>['nullable']
            ]);
        } catch (ValidationException $e) {
        }
        $data = request()->all();


        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->user_id = $value ;
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');



    }

    public function showTodos(){
       
        $data = Todo::all();
        return $data->toJson();
    }
}