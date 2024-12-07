<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller
{
    public function index()
    {
        //$todos = auth()->user()->todos; // ログイン中のユーザーのタスクを取得

        // すべてのタスクを取得（認証がない場合）
        $todos = Todo::all();

        // ログイン中のユーザーのタスクのみ取得（認証を使用している場合）
        //$todos = Todo::where('user_id', auth()->id())->get();

        //'todos.index'→'dashboard'に変更
        return view('dashboard', compact('todos')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // detailは任意で最大文字数を設定
            'detail' => 'nullable|max:1000',
        ]);

        /* auth()->user()->todos()->create([
            'title' => $request->title,
        ]); */
        Todo::create([
            'title' => $request->title,
            // detailを追加
            'detail' => $request->input('detail'), 
            // 現在のログインユーザーIDを保存
            'user_id' => auth()->id(), 
        ]);

        //return redirect()->back();から変更
        return redirect()->route('dashboard');  

    }

    public function edit(Todo $todo)
    {
        // 編集画面を表示
        return view('todos.edit', compact('todo'));
    }

    public function updateDetails(Request $request, Todo $todo)
    {
        // バリデーションを追加
        $request->validate([
            'title' => 'required|string|max:255',
            'detail' => 'nullable|max:1000',
        ]);

        // データを更新
        $todo->update([
            'title' => $request->input('title'),
            'detail' => $request->input('detail'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Todo updated successfully.');
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
