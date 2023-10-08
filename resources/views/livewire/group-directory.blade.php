<div>
    <div class="flex justify-between pb-10">
        <div class="flex items-center gap-2">
            <x-button href="{{ route('groups.my-groups') }}">
                My Groups
            </x-button>   
            <div>
                <select name="groups" wire:model.live="privacy">
                    <option value="" hidden>Select</option>
                    <option value="all" wire:model="all">All Groups</option>
                    <option value="public" wire:model="public">Public Only</option>
                    <option value="private" wire:model="private">Private Only</option>
                </select>
            </div>
        </div>     
    </div>
    
    <h1 class="mb-10 text-5xl font-light">Groups</h1>
    
    <div class="grid items-start grid-cols-4 gap-8 mb-10">
        @foreach($groups as $group)
            <div class="flex flex-col h-full">
                <x-directory-card class="rounded-b-none" title="{{ $group->name }}" description="{{ $group->description }}">
                    <p class="mt-3">Privacy: <span class="font-semibold">{{ $group->privacy }}</span></p>
                </x-directory-card>
                <x-button class="w-full rounded-none rounded-b">{{ $group->privacy == "Private" ? "Request To Join" : "Join"}}</x-button>
            </div>
        @endforeach
    </div>

    {{ $groups->links() }}
</div>
