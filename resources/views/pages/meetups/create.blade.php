@extends('layouts.main')

@section('page_title', 'Meetups')

@section('content')

<div class="text-center">
    <h1 class="text-5xl font-light">Create a Meetup</h1>
    <p class="mt-2">Create a meetup using the form below.</p>
</div>

<form method="POST" action="{{ route('meetups.store')}}">
    @csrf
    <div class="flex flex-col justify-center max-w-6xl gap-4 mx-auto mt-10">
        <div>
            <input type="text" placeholder="title" name="title" class="w-full">
            @error('title')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <div>
            <input type="text" placeholder="location" name="location" class="w-full">
            @error('location')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <div>
            <input type="datetime-local" placeholder="time" name="time" class="w-full">
            @error('time')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <div>
            <select type="text" placeholder="category" name="category" class="w-full">
                <option value="" hidden>Select</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->value }}</option>
                @endforeach
            </select>
            @error('category')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <div class="col-span-2">
            <textarea type="text" placeholder="description" name="description"class="w-full"></textarea>
            @error('description')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <div>
            <input type="text" placeholder="thumbnail" name="thumbnail" class="w-full">
            @error('thumbnail')<p class="text-red-500">{{ $message }}</p>@enderror
        </div>
        <x-button type="submit" class="flex justify-center w-full mt-4">Submit</x-button>
    </div>

</form>




@endsection
