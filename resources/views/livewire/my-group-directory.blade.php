<div x-data="{ 
        openModal: false, 
        deleteModal: false
    }"
    x-on:open-modal.window="openModal = true"
    x-on:close-modal.window="openModal = false; deleteModal = false;"
    >
    <x-button class="flex justify-self-end" wire:click="createGroup">Create a group</x-button>

    @if(session('groupSuccess'))
        <div class="px-2 py-2 mt-2 bg-green-300 rounded">
            <span class="text-xl font-light text-green-800">{{ session('groupSuccess') }}</span>
        </div>
    @endif
    
    <div class="flex flex-col gap-8 my-10">
        <div class="flex gap-2">
            <h1 class="text-4xl font-semibold">Groups I'm</h1>
            <select name="group-filter">
                <option value="partOf" wire:model.live="partOf">Part Of</option>
                <option value="ownerOf" wire:model.live="ownerOf">Owner Of</option>
            </select>
        </div>
        @if(count($userGroups) > 0)
            @foreach($userGroups as $group)
                <x-directory-card title="{{ $group->name }}" description="{{ $group->description }}">
                    <x-button class="mt-4" wire:click="editGroup({{ $group->id }})">Edit Group</x-button>
                    
                    <x-button variant="danger" class="mt-4" x-on:click="deleteModal = true;">Delete Group</x-button>
                    <x-modal show="deleteModal" title="Are you sure?">
                        <h1 class="pb-4">This action is irreversible.</h1>
                        <div class="flex gap-2">
                            <x-button type="submit" class="flex justify-center w-full" x-on:click="deleteModal = false;">No, cancel</x-button>
                            <x-button type="submit" variant="danger" class="flex justify-center w-full" wire:click="deleteGroup({{ $group->id }})">Yes, delete</x-button>
                        </div>
                    </x-modal>
                    
                </x-directory-card>
            @endforeach  
        @else
            <div class="flex justify-center">
                <h1 class="text-2xl">Nothing here yet!</h1>
            </div>
        @endif
        
        {{-- create and edit modals --}}
        <x-modal show="openModal" onClose="$dispatch('closeGroupModal')" title="{{ !$isEditing ? 'Create a group' : 'Edit your group'}}">
            <form wire:submit="{{ !$isEditing ? 'save' : 'update'}}" class="flex flex-col gap-2">
                <div class="flex flex-col">
                    <label for="groupName">Group Name</label>
                    <input type="text" wire:model="name" name="name" placeholder="Group Name">
                    <div>@error('name') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupDescription">Group Description</label>
                    <textarea type="text" wire:model="description" placeholder="Group Description" name="groupDescription" class="w-full"></textarea>
                    <div>@error('description') <p class="text-red-500">{{ $message }}</p>@enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupPrivacy">Group Privacy</label>
                    <select wire:model="privacy">
                        @foreach(App\Enums\GroupPrivacyEnum::cases() as $privacyOption)
                            <option value="" hidden>Select</option>
                            <option value="{{ $privacyOption->value }}">{{ trans('enums.group_privacy.' . $privacyOption->value)}}</option>
                        @endforeach
                    </select>
                    <div>@error('privacy') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupThumbnail">Group Thumbnail</label>
                    <input type="text" wire:model="thumbnail" name="groupThumbnail" wire:model="thumbnail" placeholder="Group Thumbnail">
                    <div>@error('thumbnail') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <x-button class="w-full mt-4">
                    <span class="w-full">Submit</span>
                </x-button>
            </form>
        </x-modal>
    </div>
</div>
