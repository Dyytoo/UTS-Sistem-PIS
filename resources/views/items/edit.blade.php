@extends('layouts.app')

@section('content')
    @include('items.form', [
        'title' => 'Edit Item',
        'action' => route('items.update', $item->id),
        'method' => 'PUT',
        'item' => $item
    ])
@endsection