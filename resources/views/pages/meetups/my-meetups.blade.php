@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="flex w-full gap-4 mx-auto text-center">
    <div class="flex flex-col justify-start gap-4">
        <x-button href="{{ route('meetups.index') }}">Back</x-button>
        <x-button variant="outline" href="{{ route('meetups.create')}}">Create A Meetup</x-button>
    </div>
    <div class="w-full">
        <h1 class="text-5xl font-light">My Meetups</h1>
        <p>Create, update and delete your meetups here</p>
    </div>
</div>

@foreach($userMeetups as $meetup)
    <x-directory-card 
        class="mt-10"
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

@endsection