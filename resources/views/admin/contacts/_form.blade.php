@props(['contact' => null])

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ isset($contact) ? 'Modifier un contact' : 'Ajouter un contact' }}</h5>

        <form action="{{ isset($contact) ? route('admin.contacts.update', $contact) : route('admin.contacts.store') }}" method="POST"
            class="row g-3">
            @csrf
            @if (isset($contact))
                @method('PUT')
            @endif

            <div class="col-md-6">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $contact->name ?? '') }}">
                @error('name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $contact->email ?? '') }}">
                @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" id="phone" name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $contact->phone ?? '') }}">
                @error('phone')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="object" class="form-label">Objet</label>
                <input type="text" id="object" name="object"
                    class="form-control @error('object') is-invalid @enderror"
                    value="{{ old('object', $contact->object ?? '') }}">
                @error('object')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" name="message" rows="4" class="form-control @error('message') is-invalid @enderror"
                    placeholder="Saisir le message">{{ old('message', $contact->message ?? '') }}</textarea>
                @error('message')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit"
                    class="btn btn-primary">{{ isset($contact) ? 'Mettre à jour' : 'Créer' }}</button>
                @if (!isset($contact))
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                @endif
            </div>
        </form>
    </div>
</div>
