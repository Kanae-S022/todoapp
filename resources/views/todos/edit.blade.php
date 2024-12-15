<x-app-layout>

<div style="display: flex; justify-content: center; min-height: 100vh; padding: 20px;">
    <div class="container" style="width: 80%; max-width: 800px; flex-direction: column;">
        <form method="POST" action="{{ route('todos.updateDetails', $todo->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-700">タイトル</label>
                <input 
                type="text" 
                name="title" 
                id="title" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                value="{{ old('title', $todo->title) }}" 
                required
                >
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for='detail' class="block mb-2 text-sm font-medium text-gray-700">詳細</label>
                <textarea 
                name="detail" 
                id="detail" 
                class="w-full h-32 px-4 py-2 border border-gray-300 rounded-lg shadow-sm resize-none focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >{{ old('detail', $todo->detail) }}</textarea>
                @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary" style="
            background: linear-gradient(to right, #ff7e5f, #feb47b); 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            font-size: 16px; 
            border-radius: 50px; 
            cursor: pointer;">更新</button>
        </form>

        <button onclick="window.location.href='{{ route('dashboard') }}'" class="btn btn-secondary" style="
        display: inline-block; 
        margin-top: 20px; 
        padding: 10px 20px; 
        font-size: 16px; 
        text-align: center; 
        border-radius: 50px; 
        text-decoration: none; 
        background-color: #6c757d; 
        color: white;">戻る</button>
    </div>
</div>
</x-app-layout>