<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    private $file = 'todos.json';

    private function getTodos()
    {
        if (!Storage::exists($this->file)) {
            Storage::put($this->file, json_encode([]));
        }

        return json_decode(Storage::get($this->file), true);
    }

    private function saveTodos($todos)
    {
        Storage::put($this->file, json_encode($todos, JSON_PRETTY_PRINT));
    }

    // GET /api/todos
    public function index()
    {
        return response()->json($this->getTodos());
    }

    // POST /api/todos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $todos = $this->getTodos();

        $todo = [
            'id' => count($todos) + 1,
            'title' => $request->title,
            'completed' => false
        ];

        $todos[] = $todo;
        $this->saveTodos($todos);

        return response()->json($todo, 201);
    }

    // PUT /api/todos/{id}
    public function update(Request $request, $id)
    {
        $todos = $this->getTodos();

        foreach ($todos as &$todo) {
            if ($todo['id'] == $id) {
                $todo['completed'] = $request->completed ?? $todo['completed'];
                $this->saveTodos($todos);
                return response()->json($todo);
            }
        }

        return response()->json(['message' => 'Todo not found'], 404);
    }

    // DELETE /api/todos/{id}
    public function destroy($id)
    {
        $todos = $this->getTodos();
        $todos = array_filter($todos, fn($t) => $t['id'] != $id);

        $this->saveTodos(array_values($todos));

        return response()->json(['message' => 'Todo supprimé']);
    }
}
