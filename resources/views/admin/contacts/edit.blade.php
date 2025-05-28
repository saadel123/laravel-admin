@extends('admin.layouts.master')

@section('content')
    @include('admin.components.page-title', [
        'title' => 'Contacts',
        'backRoute' => route('admin.contacts.index'),
        'indexRoute' => route('admin.contacts.index'),
    ])

    <section>
        <div class="row">
            <div class="col-md-12">
                @include('admin.contacts._form', ['contact' => $contact])
            </div>
        </div>
    </section>
@endsection
