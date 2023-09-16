<div class="flex flex-col gap-4">
    <div class="grid items-end grid-cols-5 gap-2">
        <div class="w-full col-span-2">
            <label for="manual-search">Manual Search</label>
            <input type="text" name="manual-search" wire:model.live="search" placeholder="Placeholder" class="w-full">
        </div>
                  
        <div>
            <label for="organiser">Organiser</label>
            <select class="w-full" name="organiser" wire:model.live="organiser">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div>
            <label for="time">Time</label>
            <select class="w-full" name="time" wire:model.live="time">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div>
            <label for="category">Category</label>
            <select class="w-full" name="category" wire:model.live="category">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
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
            <p><span class="font-semibold">Date:</span> {{ $meetup->time }}</p>
            <p><span class="font-semibold">Category:</span> {{ ucfirst(strtolower($meetup->category)) }}</p>
            <p><span class="font-semibold">Meetup Organiser:</span> {{ $meetup->user->name }}</p>
        </div>
        </x-directory-card>

        @empty
        <p>no results found!</p>
    @endforelse

    {{ $meetups->links() }}
</div>
