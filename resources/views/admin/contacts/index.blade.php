<x-admin.layout.app>
    <x-admin.layout.page-title title="Contacts" :createRoute="route('admin.contacts.create')" create-label="Ajouter" />

    <x-admin.layout.card-wrapper>
        @php
            $headers = [
                ['label' => 'Id', 'key' => 'id'],
                ['label' => 'Nom', 'key' => 'name'],
                ['label' => 'Email', 'key' => 'email'],
                ['label' => 'Objet', 'key' => 'object'],
                ['label' => 'Actions', 'key' => 'actions', 'align' => 'text-end'],
            ];

            $rows = $contacts->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'object' => $contact->object,
                    'actions' => view('components.admin.ui.action-buttons', [
                        'editRoute' => route('admin.contacts.edit', $contact->id),
                        'deleteRoute' => route('admin.contacts.destroy', $contact->id),
                    ])->render(),
                ];
            });
        @endphp

        <x-admin.ui.datatable :headers="$headers" :rows="$rows" />
    </x-admin.layout.card-wrapper>
</x-admin.layout.app>
