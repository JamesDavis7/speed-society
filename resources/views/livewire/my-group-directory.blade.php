<div>
    <x-button class="flex justify-self-end" wire:click="$dispatch('open-modal', {name: 'createGroup'})">Create a group</x-button>
    
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
                    <x-button class="mt-4" wire:click="$dispatch('open-modal', {name: 'editGroup'})">Edit Group</x-button>
                    <x-button variant="danger" class="mt-4" x-on:click="console.log('delete group')">Delete Group</x-button>
            </x-directory-card>
        @endforeach  
        
        {{-- create and edit modals --}}
        <x-modal title="Create a group" name="createGroup">
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
        {{-- <x-modal title="Edit your existing group" name="editGroup">
            <p>Edit your group using the form below.</p>
        </x-modal> --}}
    </div>
</div>
