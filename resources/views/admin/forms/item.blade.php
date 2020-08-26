@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

@section('content')
    @include('partials.admin.form.iteminput')
    @include('partials.app.items')
@endsection

