@props(['blog' => null])

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ isset($blog) ? 'Modifier un blog' : 'Ajouter un blog' }}</h5>

        <!-- Formulaire multi-colonnes -->
        <form action="{{ isset($blog) ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST"
            class="row g-3">
            @csrf
            @if (isset($blog))
                @method('PUT')
            @endif

            @foreach (['fr', 'en', 'ar'] as $lang)
                <div class="col-md-6">
                    <label for="title_{{ $lang }}" class="form-label">Titre ({{ strtoupper($lang) }})</label>
                    <input type="text" id="title_{{ $lang }}" name="title[{{ $lang }}]"
                        class="form-control" placeholder="Saisir le titre en {{ strtoupper($lang) }}"
                        value="{{ old("title.$lang", $blog->title[$lang] ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label for="content_{{ $lang }}" class="form-label">Contenu
                        ({{ strtoupper($lang) }})
                    </label>
                    <textarea id="content_{{ $lang }}" name="content[{{ $lang }}]" class="form-control" rows="2"
                        placeholder="Saisir le contenu en {{ strtoupper($lang) }}">{{ old("content.$lang", $blog->content[$lang] ?? '') }}</textarea>
                </div>
            @endforeach

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">{{ isset($blog) ? 'Mettre à jour' : 'Créer' }}</button>
                @if (!isset($blog))
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                @endif
            </div>
        </form><!-- Fin du formulaire -->
    </div>
</div>
