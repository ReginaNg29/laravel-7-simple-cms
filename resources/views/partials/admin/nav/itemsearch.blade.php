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

    <form action="{{ route('item.findItemIndex') }}" method="post" name="findItem">
    @csrf
                <div class="navbar">
                    <div class="control">
                        <label for="id">ID:</label>
                        <input type="text" name="id">
                    </div>
                </div>
                <div class="navbar">
                    <div class="control">
                        <label for="name">Name:</label>
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="navbar">
                    <div class="control">
                        <label for='amount'>Amount:</label>
                        Range <select name="range">
                            <option value="greater">Greater than</option>
                            <option value="less">Less than</option>
                        </select>
                        Amount <select name="amount">
                            <option value="amount1">Amount1</option>
                            <option value="amount2">Amount2</option>
                        </select>
                    </div>
                </div>
                <div class="navbar">
                    <div class="control">
                        <label for="createdData">CreatedData:</label>
                        From <input type="date" name="createdDataFrom">
                        To <input type="date" name="createdDataTo">
                    </div>
                </div>
                <div class="navbar">
                    <div class="control">
                        <label for="updatedData">updatedData:</label>
                        From <input type="date" name="updatedDataFrom">
                        To <input type="date" name="updatedDataTo">
                    </div>
                </div>
                </div>
                <button type="submit" name="submitbutton" value="search" class="button">Filter</button>
            </form>
</div>