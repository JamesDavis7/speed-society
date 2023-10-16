@extends('layouts.main')

@section('page_title', 'Meetups')

@if(session('meetupSuccess'))
<div class="w-full py-4 text-center bg-green-300">
    <span class="text-xl font-light text-green-800">{{ session('meetupSuccess')}}</span>
</div>
@endif

@section('content')

<div class="flex items-start w-full">
    <x-button href="{{ route('meetups.index') }}">Back</x-button>
    <div class="flex flex-col items-center justify-center mx-auto">
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

    @if(count($userMeetups) > 0 )
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
                <x-button href="{{ route('meetups.edit', ['id' => $meetup->id])}}">Manage Meetup</x-button>
            </x-directory-card>
        @endforeach
    @else
    <div class="flex justify-center">
        <h1 class="text-2xl">Nothing here yet!</h1>
    </div>
    @endif
</div>

@endsection
