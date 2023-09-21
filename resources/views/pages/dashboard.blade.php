@extends('layouts.main')

@section('page_title', 'Dashboard')

@section('content')

<div>
    <h1 class="text-5xl font-light">Welcome to Speed Society <span class="font-normal">{{ Auth::user()->name }}</span>!</h1>
</div>

<div class="flex gap-2 mt-10">
    <x-button href="{{ route('meetups.index')}}">View meetups</x-button>
    <x-button href="{{ route('groups.index')}}">View Groups</x-button>
    <x-button href="{{ route('profile.edit')}}">Your Profile</x-button>
</div>

@endsection
