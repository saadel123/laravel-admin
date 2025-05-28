@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>{{ isset($blog) ? 'Edit' : 'Add' }} Blog</h2>

    <form action="{{ isset($blog) ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST">
        @csrf
        @if(isset($blog))
            @method('PUT')
        @endif

        @foreach(['en', 'fr', 'ar'] as $lang)
            <div class="mb-3">
                <label>Title ({{ $lang }})</label>
                <input type="text" name="title[{{ $lang }}]" class="form-control"
                       value="{{ old("title.$lang", $blog->title[$lang] ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Content ({{ $lang }})</label>
                <textarea name="content[{{ $lang }}]" class="form-control" rows="3">{{ old("content.$lang", $blog->content[$lang] ?? '') }}</textarea>
            </div>
        @endforeach

        <button class="btn btn-success">{{ isset($blog) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
