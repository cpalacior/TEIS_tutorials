@extends('layouts.app')
@section('content')
<div class="container" style="display: flex; justify-content: flex-end;">
    <div class="row">
        <div class="row-lg-4 ms-auto">
            <p class="lead">email: {{ $email }}</p>
        </div>
        <div class="row-lg-4 me-auto">
            <p class="lead">numero: {{ $number }}</p>
        </div>
        <div class="row-lg-4 ms-auto">
            <p class="lead">direction: {{ $direction }}</p>
        </div>
    </div>
</div>
@endsection