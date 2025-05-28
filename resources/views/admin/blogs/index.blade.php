@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>Blog List</h2>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>

    @foreach ($blogs as $blog)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $blog->title['en'] ?? 'No Title' }}</h5>
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
