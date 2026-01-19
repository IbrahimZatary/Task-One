@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="card">
        <h2>Edit Product: {{ $product->name }}</h2>

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

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (USD) *</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required min="0">
            </div>

            <div class="form-group">
                <label for="category_id">Category *</label>
                <select name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">✓ Update Product</button>
                <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">✕ Cancel</a>
            </div>
        </form>
    </div>
@endsection
