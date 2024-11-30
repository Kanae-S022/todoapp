<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Todoアプリ</title>
</head>
<body>
<div class="container">
    <h1>Todo List</h1>

    <!-- 新しいタスクを追加 -->
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="タイトルを入力" required>
        <input type="textarea" name="detail" placeholder="詳細を入力">
        <button type="submit">追加</button>
    </form>

    <!-- タスクのリスト -->
    <ul>
        @foreach ($todos as $todo)
        <li>
            <form action="{{ route('todos.update', $todo) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                <span style="{{ $todo->completed ? 'text-decoration: line-through;' : '' }}">{{ $todo->title }}</span>
            </form>

            <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>