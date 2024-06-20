<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use App\Models\Category;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * index para mostrar los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edicion
     **/

     public function store(Request $request){
        //validar
        $request->validate( [
            'title' => 'required|min:5',
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        //redireccionar
        return redirect()->route('todos')->with('success', 'Tarea creada exitosamente.');
     }

     public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', compact('todos', 'categories'));
     }

     public function show($id){
        $todo = Todo::find($id);
        $categories = Category::all();
        return view('todos.show', compact('todo', 'categories'));
     }

     public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea actualizada exitosamente.');
     }

     public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea eliminada exitosamente.');
     }


}
