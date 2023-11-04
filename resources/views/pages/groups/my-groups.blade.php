@extends('layouts.main')

@section('page_title', 'Groups')

@section('content')

<div class="flex items-start w-full">
    <x-button href="{{ route('groups.index') }}">Back</x-button>
    <div class="flex flex-col items-center justify-center mx-auto">
        <h1 class="text-5xl font-light">My Groups</h1>
        <p class="text-gray-500">Your favourite groups and created groups will appear here</p>
        
    </div>
</div>

@livewire('my-group-directory')

@endsection
