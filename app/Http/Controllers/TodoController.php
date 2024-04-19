<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){

        return Todo::all();
        //retorna todas as tarefas
    }

    //cria uma tarefa
    public function create(Request $request){
        try{
            $this->validate($request, [
            'name' => ['required'],
            'description' => ['required']
            ]);
        }catch (ValidationException $e) {
        }

        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->save();

        return response()->json(['message' => 'Todo created successfully'], 201);
    }
    
    public function details($id){
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return $todo;
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->save();

        return response()->json(['message' => 'Todo updated successfully'], 200);
    }


    public function delete($id){
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully'], 200);
    }


    public function edit($id){
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return $todo;
    }

    public function complete($id){
		$todo = Todo::find($id);
		$todo->iscompleted = true;
		$todo->save();
		return response()->json([
			"code" => 200,
			"message" => "Task listed as completed"
		]);
	}
}
