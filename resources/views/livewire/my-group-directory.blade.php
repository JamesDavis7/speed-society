<div x-data="{ 
        openModal: false, 

    }"
    x-on:open-modal.window="openModal = true"
>
    <x-button class="flex justify-self-end" wire:click="createGroup">Create a group</x-button>
    
    @if(session('success'))
        <div class="px-2 py-2 mt-2 bg-green-300 rounded">
            <span class="text-xl font-light text-green-800">{{ session('success') }}</span>
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
        @foreach($userGroups as $group)
            <x-directory-card title="{{ $group->name }}" description="{{ $group->description }}">
                <x-button class="mt-4" wire:click="editGroup">Edit Group</x-button>
                <x-button variant="danger" class="mt-4" x-on:click="console.log('delete group')">Delete Group</x-button>
            </x-directory-card>
        @endforeach  
        
        {{-- create and edit modals --}}
        <x-modal show="openModal" title="{{ !$isEditing ? 'Create a group' : 'Edit your group'}}">
            <form wire:submit="save" class="flex flex-col gap-2">
                <div class="flex flex-col">
                    <label for="groupName">Group Name</label>
                    <input type="text" wire:model="form.name" name="name" placeholder="Group Name">
                    <div>@error('form.name') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupDescription">Group Description</label>
                    <textarea type="text" wire:model="form.description" placeholder="Group Description" name="groupDescription" class="w-full"></textarea>
                    <div>@error('form.description') <p class="text-red-500">{{ $message }}</p>@enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupPrivacy">Group Privacy</label>
                    <select wire:model="form.privacy">
                        @foreach($groupPrivacyOptions as $privacyOption)
                            <option value="" hidden>Select</option>
                            <option value="{{ $privacyOption->value }}">{{ trans('enums.group_privacy.' . $privacyOption->value)}}</option>
                        @endforeach
                    </select>
                    <div>@error('form.privacy') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <div class="flex flex-col">
                    <label for="groupThumbnail">Group Thumbnail</label>
                    <input type="text" wire:model="form.thumbnail" name="groupThumbnail" wire:model="thumbnail" placeholder="Group Thumbnail">
                    <div>@error('form.thumbnail') <p class="text-red-500">{{ $message }}</p> @enderror</div>
                </div>
                <x-button class="w-full mt-4">
                    <span class="w-full">Submit</span>
                </x-button>
            </form>
        </x-modal>
    </div>
</div>
