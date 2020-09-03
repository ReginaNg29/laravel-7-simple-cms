@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

<section class="section">
<div class="item-box">
    <!-- Success message -->
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

    <form action="{{ route('item.search') }}" method="post" role="search">
    @csrf
                <div class="navbar">
                    <div class="control">
                        <label for="id">ID:</label>
                        <input type="text" name="id">
                    </div>
                </div>
                <button type="submit" class="button" value="filterId" name="submit">Filter</button>
            </form>
</div>

@include('partials.app.item')
