
@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="card">
        <h2>Create New Category</h2>

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

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g., Electronics, Clothing, Books">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Enter a brief description of this category">{{ old('description') }}</textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">✓ Create Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">✕ Cancel</a>
            </div>
        </form>
    </div>
@endsection
EOF