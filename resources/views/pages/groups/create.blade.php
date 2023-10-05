@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="max-w-6xl mx-auto">
    <form>
        <div class="flex flex-col justify-between gap-4 mx-auto mt-10">
            <div class="grid grid-cols-3">
                <x-button href="{{ route('meetups.my-meetups') }}">Back</x-button>
                <div class="flex flex-col justify-center flex-1 mx-auto text-center">
                    <h1 class="text-5xl font-light">Create a Meetup</h1>
                    <p class="mt-2">Create a meetup using the form below.</p>
                </div>
            </div>
            <x-button type="submit" class="flex justify-center w-full mt-4">Submit</x-button>
        </div>
    </form>
</div>




@endsection
