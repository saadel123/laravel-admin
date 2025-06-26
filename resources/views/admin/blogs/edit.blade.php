@extends('admin.layouts.master')

@section('content')
    <x-admin.layout.page-title title="Blogs" :backRoute="route('admin.blogs.index')" :createRoute="route('admin.blogs.create')" create-label="Ajouter" :indexRoute="route('admin.blogs.index')" />

    <section>
        <div class="row">
            <div class="col-md-12">
                @include('admin.blogs._form', ['blog' => $blog])
            </div>
        </div>
    </section>
@endsection
