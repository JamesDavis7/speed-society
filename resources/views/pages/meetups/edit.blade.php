@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="flex flex-col justify-center max-w-6xl gap-4 mx-auto mt-10">
    <form method="POST" action="{{ route('meetups.update', $meetup->id) }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-4">
            <div class="grid grid-cols-3">
                <x-button href="{{ route('meetups.my-meetups') }}">Back</x-button>
                <div class="flex flex-col justify-center flex-1 mx-auto text-center">
                    <h1 class="text-5xl font-light">Manage your Meetup</h1>
                    <p class="mt-2">Update or delete your meetup</p>
                </div>
            </div>
            <div>
                <input type="text" placeholder="Title" value="{{ old('title', $meetup->title)}}" name="title" class="w-full">
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
                <input type="datetime-local" value="{{ old('time', $meetup->time)}}" placeholder="Time" name="time" class="w-full">
                @error('time')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <select type="text" placeholder="Category" name="category" class="w-full">
                    <option value="" hidden>Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->value }}" {{ old('category', $meetup->category) == $category->value ? 'selected' : '' }}>
                            {{ trans('enums.meetup_category.' . strtolower($category->name)) }}
                        </option>                    
                    @endforeach
                </select>
                @error('category')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="col-span-2">
                <textarea type="text" placeholder="Description" name="description" class="w-full">{{ old('description', $meetup->description) }}</textarea>
                @error('description')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <input type="text" placeholder="Thumbnail" name="thumbnail"  value="{{ old('thumbnail', $meetup->thumbnail)}}" class="w-full">
                @error('thumbnail')<p class="text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>
        <x-button type="submit" class="flex justify-center w-full mt-4">Update</x-button>
    </form>
    <form action="{{ route('meetups.destroy', $meetup->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <x-button type="submit" variant="danger" class="flex justify-center w-full">Delete This Meetup</x-button>
    </form>
</div>





@endsection
