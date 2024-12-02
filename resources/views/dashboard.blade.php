
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<!--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
-->

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
                <span style="{{ $todo->completed ? 'text-decoration: line-through;' : '' }}">{{ $todo->id }}{{ $todo->title }}{{ $todo->detail }}</span>
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
</x-app-layout>

