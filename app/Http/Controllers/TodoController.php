<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos; // ログイン中のユーザーのタスクを取得
        return view('dashboard', compact('todos')); //'todos.index'
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        /* auth()->user()->todos()->create([
            'title' => $request->title,
        ]); */
        Todo::create([
            'title' => $request->title,
        ]);

        return redirect()->route('dashboard'); //return redirect()->back(); 

    }

    use AuthorizesRequests;

    public function update(Request $request, Todo $todo)
    {
        \Log::debug('ccc');
        //$this->authorize('update', $todo); // ユーザー権限を確認

        $todo->update([
            'completed' => $request->has('completed'),
        ]);

        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        //$this->authorize('delete', $todo); // ユーザー権限を確認

        $todo->delete();

        return redirect()->back();
    }
}
