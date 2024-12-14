
<x-app-layout>

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

<div style="display: flex; justify-content: center; min-height: 100vh; padding: 20px;">
    <div class="container" style="width: 80%; max-width: 800px; flex-direction: column;">
        <br>
        <!-- 新しいタスクを追加 -->
        <form action="{{ route('todos.store') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-4">
                <input 
                    type="text" 
                    name="title" 
                    placeholder="タイトルを入力" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
            <div class="mb-4">
                <textarea
                    name="detail" 
                    placeholder="詳細を入力"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div style="display: flex; justify-content: center;">
                <button 
                    type="submit" 
                    style="
                    background: linear-gradient(to right, #ff7e5f, #feb47b); 
                    color: white; 
                    border: none; 
                    padding: 10px 20px; 
                    font-size: 16px; 
                    border-radius: 50px; 
                    cursor: pointer;"
                >
                    追加
                </button>
            </div>
        </form>

        <hr style="width: 100%; max-width: 800px; margin: 20px 0;">

        <br>

        <!-- タスクのリスト -->
        <table border="1" style="width: 100%; text-align: center; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>詳細</th>
                    <th>ステータス</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td style="{{ $todo->completed ? 'text-decoration: line-through;' : '' }}">{{ $todo->title }}</td>
                    <td>{{ $todo->detail }}</td>
                    <td>
                        <form action="{{ route('todos.update', $todo) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="
                            background: linear-gradient(to right, #00c6ff, #a8e5f5); 
                            color: white; 
                            border: none; 
                            padding: 10px 20px; 
                            font-size: 16px; 
                            border-radius: 50px; 
                            cursor: pointer;">削除</button>
                        </form>
                        <form action="{{ route('todos.edit', $todo->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-sm btn-warning" style="
                            background: linear-gradient(to right, #11ca11, #00f97c); 
                            color: white; 
                            border: none; 
                            padding: 10px 20px; 
                            font-size: 16px; 
                            border-radius: 50px; 
                            cursor: pointer;">編集</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>

