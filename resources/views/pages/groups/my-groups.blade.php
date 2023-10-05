@extends('layouts.main')

@section('page_title', 'Groups')

@section('content')

<div class="flex w-full gap-4 mx-auto text-center">
    <x-button href="{{ route('groups.index') }}">Back</x-button>
    <div class="w-full">
        <h1 class="text-5xl font-light">My Groups</h1>
        <p>Create, update and delete your groups here</p>
    </div>
</div>

@livewire('my-group-directory')

@endsection