<div>
    <x-button class="flex justify-self-end">Create a group</x-button>
    
    <div class="grid items-start grid-cols-4 gap-8 my-10">
        @foreach($userGroups as $group)
        <div class="flex flex-col h-full">
            <x-directory-card title="{{ $group->name }}" description="{{ $group->description }}">
                @if($group->pivot->role === "admin")
                    <x-button class="mt-4">Manage Group</x-button>
                @endif
            </x-directory-card>
        </div>
        @endforeach
    </div>
</div>
