@extends('layouts.main')

@section('page_title', 'Meetup')

@section('content')

<div class="flex flex-col gap-10">
    <x-button href="{{ route('meetups.index')}}">
        Go Back
    </x-button>
    <div class="flex items-start gap-10">
        <img src="{{ $meetup->thumbnail }}" alt="meetup-thumbnail" class="rounded">
        <div class="flex flex-col w-full gap-10">
            <div>
                <h1 class="text-5xl font-light">{{ $meetup->title }}</h1>
                <p class="mt-2 font-light">Organised by: <span class="font-semibold text-black">{{ $meetup->user->name}}</span></p>
            </div>
            <div class="flex flex-col gap-4">
                <div>
                    <h2 class="mb-2 text-3xl font-light">Description</h2>
                    <p class="font-semibold">{{ $meetup->description }}</p>
                </div>
                <div>
                    <h2 class="mb-2 text-3xl font-light">Time</h2>
                    <p class="font-semibold">{{ formatDateTime($meetup->time) }}</p>
                </div>
                <div>
                    <h2 class="mb-2 text-3xl font-light">Type</h2>
                    <p class="font-semibold">{{ $meetup->category }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection