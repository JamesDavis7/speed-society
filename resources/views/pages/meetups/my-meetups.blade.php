@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="flex w-full gap-4 mx-auto text-center">
    <div class="flex flex-col justify-start gap-4">
        <x-button href="{{ route('meetups.index') }}">Back</x-button>
    </div>
    <div class="w-full">
        <h1 class="text-5xl font-light">My Meetups</h1>
        <p class="text-gray-500">Your personal meetups directory</p>
    </div>
</div>

<div class="flex flex-col gap-8">
    <x-button variant="outline" href="{{ route('meetups.create')}}">Create A Meetup</x-button>
    <div class="flex gap-2">
        <h1 class="text-4xl font-semibold">Meetups I'm</h1>
        <select name="group-filter">
            <option value="goingTo" wire:model.live="goingTo">Going To</option>
            <option value="organising" wire:model.live="organising">Organising</option>
        </select>
    </div>
    
    @foreach($userMeetups as $meetup)
        <x-directory-card 
            id="{{ $meetup->id }}"
            title="{{ $meetup->title }}"
            description="{{ $meetup->description }}"
            image="{{ $meetup->thumbnail }}"
            >
            <div class="p-4">
            <p><span class="font-semibold">Date:</span> {{ formatDateTime($meetup->time) }}</p>
            <p><span class="font-semibold">Meetup Organiser:</span> {{ $meetup->user->name }}</p>
            <p><span class="font-semibold">Location:</span> {{ $meetup->location }}</p>
            <p><span class="font-semibold">Category:</span> {{  trans('enums.meetup_category.' . $meetup->category)}}</p>
            </div>
        </x-directory-card>
    @endforeach
</div>

@endsection
