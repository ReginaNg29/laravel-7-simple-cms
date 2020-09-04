@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

<section class="section">
<div class="item-box">
    <button type="submit" class="button is-dark" style="float:right" action="{{ route('item.showLogin') }}">Logout</button>

    <form action="{{ route('item.search') }}" method="post" role="search">
    @csrf
                <div class="navbar">
                    <div class="control">
                        <label for="amount">Amount Range:</label>
                        <input type="text" name="from" placeholder="from">
                        <input type="text" name="to" placeholder="to">
                    </div>
                </div>
                <button type="submit" class="button" value="filterAmount" name="submitButton">Filter</button>
            </form>
            <button type="submit" class="button" value="back" name="submitButton" onclick="window.location='{{ route("item.store") }}'">Back</button>
</div>

@include('partials.app.item')