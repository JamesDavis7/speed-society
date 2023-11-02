
@extends('layouts.main')

@section('page_title', 'Meetups')


@section('content')

@if(session('meetupSuccess'))
    <div class="w-full py-4 text-center bg-green-300">
        <span class="text-xl font-light text-green-800">{{ session('meetupSuccess')}}</span>
    </div>
@endif

<div class="flex items-start w-full">
    <x-button href="{{ route('meetups.index') }}">Back</x-button>
    <div class="flex flex-col items-center justify-center mx-auto">
        <h1 class="text-5xl font-light">My Meetups</h1>
        <p class="text-gray-500">Your personal meetups directory</p>
    </div>
</div>

<div class="flex flex-col gap-8" x-data="{
    showModal: false
}">
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
                    <p><span class="font-semibold">Meetup Organiser:</span>
                    @foreach($meetup->users->where('pivot.role', 'organiser') as $user)
                        {{ $user->name }} 
                    @endforeach
                    </p>
                    <p><span class="font-semibold">Location:</span> {{ $meetup->location }}</p>
                    <p><span class="font-semibold">Category:</span> {{  trans('enums.meetup_category.' . $meetup->category)}}</p>
                    <p><span class="font-semibold">Participants:</span> {{ count($meetup->users->where('pivot.role', 'participant'))}}</p>
                </div>
                @can('edit', $meetup)
                    <x-button href="{{ route('meetups.edit', ['id' => $meetup->id])}}">Manage Meetup</x-button>
                @endcan
                @cannot('edit', $meetup) 
                    <x-button x-on:click="showModal = true;">I'm not going</x-button>
                @endcannot

                <x-modal show="showModal" title="Are you sure?">
                    <h1 class="pb-4">You will no longer be a participant of this meetup and it will be removed from your personal directory.</h1>
                    <div class="flex items-center w-full gap-2">
                        <x-button type="submit" class="flex justify-center w-full" x-on:click="showModal = false;">No, cancel</x-button>
                        <div>
                            <form action="{{ route('meetups.not-going', $meetup->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <x-button type="submit" variant="danger" class="flex justify-center">Yes, I'm sure</x-button>
                            </form>
                        </div>
                    </div>
                </x-modal>
            </x-directory-card>
        @endforeach
    @else
        <div class="flex justify-center">
            <h1 class="text-2xl">Nothing here yet!</h1>
        </div>
    @endif

    
</div>

@endsection