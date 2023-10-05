@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="max-w-6xl mx-auto">
    <form method="POST" action="{{ route('meetups.store')}}">
        @csrf
        <div class="flex flex-col justify-between gap-4 mx-auto mt-10">
            <div class="grid grid-cols-3">
                <x-button href="{{ route('meetups.my-meetups') }}">Back</x-button>
                <div class="flex flex-col justify-center flex-1 mx-auto text-center">
                    <h1 class="text-5xl font-light">Create a Meetup</h1>
                    <p class="mt-2">Create a meetup using the form below.</p>
                </div>
            </div>
            <div>
                <input type="text" placeholder="Title" name="title" class="w-full">
                @error('title')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <select type="text" name="location" class="w-full">
                    <option value="" hidden>Select</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->location }}" {{ old('location', $meetup->location) == $location->location ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>                    
                    @endforeach
                </select>
                @error('location')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <input type="datetime-local" placeholder="Time" name="time" class="w-full">
                @error('time')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <select type="text" placeholder="Category" name="category" class="w-full">
                    <option value="" hidden>Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->value }}" {{ old('category', $meetup->category) == $category->name ? 'selected' : '' }}>
                            {{ trans('enums.meetup_category.' . $category->value) }}
                        </option>   
                    @endforeach                    
                </select>
                @error('category')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <textarea type="text" placeholder="Description" name="description"class="w-full"></textarea>
                @error('description')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <input type="text" placeholder="Thumbnail" name="thumbnail" class="w-full">
                @error('thumbnail')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <x-button type="submit" class="flex justify-center w-full mt-4">Submit</x-button>
        </div>
    </form>
</div>




@endsection
