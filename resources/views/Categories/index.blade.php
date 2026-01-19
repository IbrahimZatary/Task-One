
@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="header-flex">
            <h2>All Categories</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-success">+ Create New Category</a>
        </div>

        @if($categories->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Products Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td>{{ Str::limit($category->description, 50) }}</td>
                                <td>{{ $category->products->count() }} products</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                📦 No categories found. Create your first category to get started!
            </div>
        @endif
    </div>
@endsection
EOF