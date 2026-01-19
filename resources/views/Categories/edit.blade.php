@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="card">
        <h2>Edit Category: {{ $category->name }}</h2>

        @if ($errors->any())
            <div class="error-alert">
                <strong>⚠️ Oops! Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">✓ Update Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">✕ Cancel</a>
            </div>
        </form>
    </div>
@endsection
EOF