@extends('layouts.main')

@section('page_title', 'Dashboard')

@section('content')

<div>
    <h1 class="text-5xl font-light">Welcome to Speed Society <span class="font-normal">{{ Auth::user()->name }}</span>!</h1>
</div>

@endsection
