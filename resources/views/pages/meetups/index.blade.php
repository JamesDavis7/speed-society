@extends('layouts.main')

@section('page_title', 'Dashboard')

@section('content')

<div class="pb-10">
    <x-button href="{{ route('pages.dashboard')}}">
        Go Back
    </x-button>
</div>

@livewire('meetup-directory')

@endsection
