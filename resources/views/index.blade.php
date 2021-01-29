@extends('layout')

@section('pageTitle','Movies')

@section('content')

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<div class="flex-center position-ref full-height" id="app">
    <app></app>
</div>
    
<script src="{{ mix('js/app.js') }}"></script>
@endsection

