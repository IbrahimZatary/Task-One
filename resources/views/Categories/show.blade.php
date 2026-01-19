@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="card">
        <div class="header-flex">
            <div>
                   <h2>{{ $category->name }}</h2>
                <p style="color: #666; margin-top: 10px; font-size: 16px;">{{ $category->description }}</p>
            </div>
            <div class="btn-group">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary"> Edit Category</a>
                <a href="{{ route('categories.index') }}" class="btn btn-primary"> Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="header-flex">
            <h2>Products in {{ $category->name }}</h2>
            <a href="{{ route('products.create', ['category_id' => $category->id]) }}" class="btn btn-success"> Add New Product</a>
        </div>

        @if($category->products->count() > 0)
            <div class="product-grid">
                @foreach($category->products as $product)
                    <div class="product-card" onclick="window.location='{{ route('products.show', $product) }}'">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ Str::limit($product->description, 100) ?: 'No description available.' }}</p>
                        <div class="product-card-footer">
                            <span class="product-price">${{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary" onclick="event.stopPropagation()">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                 No products in this category yet.<br>
            </div>
        @endif
    </div>
@endsection
