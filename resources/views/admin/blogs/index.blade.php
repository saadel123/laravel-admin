@extends('admin.layouts.master')

@section('content')
    @include('admin.components.page-title', [
        'title' => 'Blogs',
        'createRoute' => route('admin.blogs.create'),
        'createLabel' => 'Ajouter',
    ])

    <section class="section container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('admin.components.datatable', [
                            'headers' => [
                                ['label' => 'Id', 'key' => 'id'],
                                ['label' => 'Titre (FR)', 'key' => 'title.fr'],
                                ['label' => 'Slug', 'key' => 'slug'],
                                ['label' => 'Date', 'key' => 'date'],
                                ['label' => 'Actions', 'key' => 'actions', 'align' => 'right'],
                            ],
                            'rows' => $blogs->map(function ($blog) {
                                return [
                                    'id' => $blog->id,
                                    'title.fr' => $blog->title['fr'] ?? '-',
                                    'slug' => $blog->slug,
                                    'date' => $blog->created_at->format('Y-m-d'),
                                    'actions' => view('admin.components.action-buttons', [
                                        'editRoute' => route('admin.blogs.edit', $blog->id),
                                        'deleteRoute' => route('admin.blogs.destroy', $blog->id),
                                    ])->render(),
                                ];
                            }),
                        ])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
