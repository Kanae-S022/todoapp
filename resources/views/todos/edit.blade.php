
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>タスクを編集する</h2>
    <form method="POST" action="{{ route('todos.updateDetails', $todo->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for='detail' class="form-label">詳細</label>
            <textarea name="detail" id="detail" class="form-control">{{ old('detail', $todo->detail) }}"></textarea>
            @error('detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
@endsection