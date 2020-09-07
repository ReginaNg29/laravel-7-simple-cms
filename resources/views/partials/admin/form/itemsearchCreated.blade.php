@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

<section class="section">
    <div class="item-box">
        <button type="submit" class="button is-dark" style="float:right" onclick="window.location='{{ route("item.destroy") }}'">Logout</button>

        <form action="{{ route('item.search') }}" method="post" role="search">
        @csrf
            <div class="navbar">
                <div class="control">
                    <label for="createdData">Created Data:</label>
                    From <input type="date" name="createdDataFrom">
                    To <input type="date" name="createdDataTo">
                </div>
            </div>
        <button type="submit" class="button" value="filterCreated" name="submitButton">Filter</button>
        </form>
        <button type="submit" class="button" value="back" name="submitButton" onclick="window.location='{{ route("item.store") }}'">Back</button>
    </div>

@include('partials.app.item')
