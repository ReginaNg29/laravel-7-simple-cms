@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

<section class="section">
<button type="submit" class="button is-dark" style="float:right" onclick="window.location='{{ route("item.destroy") }}'">Logout</button>
    <div class="item-box">
        <form action="{{ route('item.search') }}" method="post" role="search">
        @csrf
            <div class="navbar">
                <div class="control">
                    <label for="id">ID:</label>
                    <input type="text" name="id">
                </div>
            </div>
        <button type="submit" class="button" value="filterId" name="submitButton">Filter</button>
        </form>
    <button type="submit" class="button" value="back" name="submitButton" onclick="window.location='{{ route("item.store") }}'">Back</button>
    </div>

@include('partials.app.item')
