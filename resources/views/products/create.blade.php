@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="card">
        <h2>Create New Product</h2>

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

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Product Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g., iPhone 15 Pro, Nike Air Max">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Enter product description, features, specifications...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (USD) *</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required placeholder="0.00" min="0">
            </div>

            <div class="form-group">
                <label for="category_id">Category *</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Select a Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', request('category_id')) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">✓ Create Product</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">✕ Cancel</a>
            </div>
        </form>
    </div>
@endsection
EOF