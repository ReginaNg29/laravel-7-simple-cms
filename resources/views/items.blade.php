@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

@section('content')
    <section class="section">
        <table style="width:100%; border: 1px solid #ddd; text-align: left;">
            <tr>
                <td>Id</td>
                <th>Amount</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </table>
    </section>

