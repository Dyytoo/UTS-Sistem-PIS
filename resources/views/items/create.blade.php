@extends('layouts.app')

@section('content')
    @include('items.form', [
        'title' => 'Create New Item',
        'action' => route('items.store'),
        'item' => new App\Models\Item()
    ])
@endsection