<x-admin.layout.app title="Create New Article">
    <x-admin.layout.page-title title="Blogs" :backRoute="route('admin.blogs.index')" :createRoute="route('admin.blogs.create')" create-label="Ajouter" :indexRoute="route('admin.blogs.index')" />

    <section>
        <div class="row">
            <div class="col-md-12">
                @include('admin.blogs._form')
            </div>
        </div>
    </section>
</x-admin.layout.app>