@extends('admin.layouts.master')

@section('content')
    @include('admin.components.page-title', [
        'title' => 'Contacts',
        'createRoute' => route('admin.contacts.create'),
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
                                ['label' => 'Nom', 'key' => 'name'],
                                ['label' => 'Email', 'key' => 'email'],
                                ['label' => 'Objet', 'key' => 'object'],
                                ['label' => 'Actions', 'key' => 'actions', 'align' => 'right'],
                            ],
                            'rows' => $contacts->map(function ($contact) {
                                return [
                                    'id' => $contact->id,
                                    'name' => $contact->name,
                                    'email' => $contact->email,
                                    'object' => $contact->object,
                                    'actions' => view('admin.components.action-buttons', [
                                        'editRoute' => route('admin.contacts.edit', $contact->id),
                                        'deleteRoute' => route('admin.contacts.destroy', $contact->id),
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
