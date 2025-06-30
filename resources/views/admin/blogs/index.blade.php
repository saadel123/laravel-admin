<x-admin.layout.app>
    <x-admin.layout.page-title title="Blogs" :createRoute="route('admin.blogs.create')" create-label="Ajouter" />

    <x-admin.layout.card-wrapper>
        @php
            $headers = [
                ['label' => 'Id', 'key' => 'id'],
                ['label' => 'Titre (FR)', 'key' => 'title.fr'],
                ['label' => 'Slug', 'key' => 'slug'],
                ['label' => 'Date', 'key' => 'date'],
                ['label' => 'Actions', 'key' => 'actions', 'align' => 'text-end'],
            ];

            $rows = $blogs->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title.fr' => $blog->title['fr'] ?? '-',
                    'slug' => $blog->slug,
                    'date' => $blog->created_at->format('Y-m-d'),
                    'actions' => view('components.admin.ui.action-buttons', [
                        'editRoute' => route('admin.blogs.edit', $blog->id),
                        'deleteRoute' => route('admin.blogs.destroy', $blog->id),
                    ])->render(),
                ];
            });
        @endphp

        <x-admin.ui.datatable :headers="$headers" :rows="$rows" />
    </x-admin.layout.card-wrapper>
</x-admin.layout.app>
