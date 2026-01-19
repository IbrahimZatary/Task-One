@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="card">
        <div class="product-detail-header">
            <div>
                <span class="badge">{{ $product->category->name }}</span>
                <h2 class="product-detail-title">{{ $product->name }}</h2>
            </div>
            <div class="btn-group">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">✏️ Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete</button>
                </form>
            </div>
        </div>

        <div class="product-detail-section">
            <div class="price-display">
                <h3>${{ number_format($product->price, 2) }}</h3>
                <p>Product Price</p>
            </div>

            <div class="info-section">
                <h3> Description</h3>
                <p>{{ $product->description ?: 'No description available for this product.' }}</p>
            </div>

            <div class="info-section">
                <h3>ℹ Product Information</h3>
                <div class="info-box">
                    <p><strong>Product ID:</strong> #{{ $product->id }}</p>
                    <p><strong>Category:</strong> 
                        <a href="{{ route('categories.show', $product->category) }}">
                            {{ $product->category->name }}
                        </a>
                    </p>
                    <p><strong>Created:</strong> {{ $product->created_at->format('F d, Y') }}</p>
                    <p><strong>Last Updated:</strong> {{ $product->updated_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>

            <div class="btn-group" style="margin-top: 35px;">
                <a href="{{ route('categories.show', $product->category) }}" class="btn btn-primary"> Back to {{ $product->category->name }}</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">View All Categories</a>
            </div>
        </div>
    </div>
@endsection
