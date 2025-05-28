@extends('admin.layouts.master')

@section('content')
    @include('admin.components.page-title', [
        'title' => 'Utilisateurs',
        'backRoute' => route('admin.users.index'),
        'createRoute' => route('admin.users.create'),
        'createLabel' => 'Ajouter',
        'indexRoute' => route('admin.users.index'),
    ])

    <section>
        <div class="row">
            <div class="col-md-12">
                @include('admin.users._form', ['user' => $user])
            </div>
        </div>
    </section>
@endsection
