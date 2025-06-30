<x-admin.layout.app>
    <x-admin.layout.page-title title="Utilisateurs" :createRoute="route('admin.users.create')" create-label="Ajouter" />

    <x-admin.layout.card-wrapper>
        @php
            $headers = [
                ['label' => 'ID', 'key' => 'id'],
                ['label' => 'Nom', 'key' => 'name'],
                ['label' => 'Email', 'key' => 'email'],
                ['label' => 'Date', 'key' => 'created_at'],
                ['label' => 'Actions', 'key' => 'actions', 'align' => 'text-end'],
            ];

            $rows = $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at->format('Y-m-d'),
                    'actions' => view('components.admin.ui.action-buttons', [
                        'editRoute' => route('admin.users.edit', $user),
                        'deleteRoute' => route('admin.users.destroy', $user),
                    ])->render(),
                ];
            });
        @endphp

        <x-admin.ui.datatable :headers="$headers" :rows="$rows" />
    </x-admin.layout.card-wrapper>
</x-admin.layout.app>
