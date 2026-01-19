@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="card">
        <div class="header-flex">
            <h2>All Products</h2>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">← Back to Categories</a>
        </div>

        @if($products->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td>
                                    <a href="{{ route('categories.show', $product->category) }}" style="color: #667eea; text-decoration: none; font-weight: 600;">
                                        {{ $product->category->name }}
                                    </a>
                                </td>
                                <td style="font-weight: 700; color: #11998e;">${{ number_format($product->price, 2) }}</td>
                                <td>{{ Str::limit($product->description, 50) ?: 'No description' }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                📦 No products found.<br>Start by creating a category, then add products to it!
            </div>
        @endif
    </div>
@endsection