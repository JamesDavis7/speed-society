
<div>
    <div class="flex justify-between pb-10">
        <x-button variant="outline" href="{{ route('meetups.my-meetups')}}">
            My Meetups
        </x-button>
    </div>
    <h1 class="mb-10 text-5xl font-light">Meetups</h1>
    <div class="flex flex-col gap-4">
        <div class="grid items-end grid-cols-5 gap-2">
            {{-- Filters --}}
            <div class="w-full col-span-2">
                <label for="manual-search">Search By Title</label>
                <input type="text" name="manual-search" wire:model.live="search" placeholder="Search" class="w-full">
            </div>       
            <div>
                <label for="time">Time</label>
                <select class="w-full" name="time" wire:model.live="time">
                    <option value="" hidden>Select</option>
                    <option value="earliest" wire:model="earliest">Earliest First</option>
                    <option value="latest" wire:model="latest">Latest First</option>
                </select>
            </div>
            <div>
                <label for="category">Category</label>
                <select class="w-full" name="category" wire:model.live="category">
                    <option value="" hidden>Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->value }}">{{ trans('enums.meetup_category.' . $category->value)}}</option>
                    @endforeach
                </select>
            </div>
                <div>
                    <label for="organiser">Organiser</label>
                    <select class="w-full" name="organiser" wire:model.live="organiser">
                        <option value="" hidden>Select</option>
                        @foreach($organisers as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>

        @forelse($meetups as $meetup)
            <x-directory-card 
                id="{{ $meetup->id }}"
                title="{{ $meetup->title }}"
                description="{{ $meetup->description }}"
                image="{{ $meetup->thumbnail }}"
            >
            <div class="p-4">
                <p><span class="font-semibold">Date:</span> {{ formatDateTime($meetup->time) }}</p>
                <p><span class="font-semibold">Meetup Organiser:</span>N/A</p>
                <p><span class="font-semibold">Location:</span> {{ $meetup->location }}</p>
                <p><span class="font-semibold">Category:</span> {{  trans('enums.meetup_category.' . $meetup->category)}}</p>
                <form method="POST" action="/meetups/mark-as-going">
                    @csrf
                    @method('PUT')
                    <x-button class="mt-4">I'm interested</x-button>
                </form>
            </div>
            </x-directory-card>
    
            @empty
            <p>no results found!</p>
        @endforelse
    
        {{ $meetups->links() }}
    </div>
</div>
