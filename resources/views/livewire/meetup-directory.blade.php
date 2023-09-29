
<div>
    <div class="flex justify-between pb-10">
        <x-button variant="outline" href="{{ route('meetups.create')}}">
            Create A Meetup
        </x-button>
        <div>
            <label for="my meetups only" class="mr-2">My Meetups Only</label>
            <input type="checkbox" name="my meetups only" wire:model.live="mineOnly">
        </div>
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
            @if(!$mineOnly)
                <div>
                    <label for="organiser">Organiser</label>
                    <select class="w-full" name="organiser" wire:model.live="organiser">
                        <option value="" hidden>Select</option>
                        @foreach($organisers as $id => $name)
                            <option value="{{ $id }}">{{ $user->name == $name ?  'Me' : $name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
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
                <p><span class="font-semibold">Meetup Organiser:</span> {{ $meetup->user->name }}</p>
                <p><span class="font-semibold">Location:</span> {{ $meetup->location }}</p>
                <p><span class="font-semibold">Category:</span> {{  trans('enums.meetup_category.' . $meetup->category)}}</p>
            </div>
            @if( $user->id === $meetup->organiser_id)
                <x-slot:action>
                    <x-button href="{{ route('meetups.edit', ['id' => $meetup->id] ) }}">Manage Meetup</x-button>
                </x-slot:action>
            @endif
            </x-directory-card>
    
            @empty
            <p>no results found!</p>
        @endforelse
    
        {{ $meetups->links() }}
    </div>
</div>
