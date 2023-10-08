<div>
    <x-button class="flex justify-self-end" wire:click="$dispatch('open-modal')">Create a group</x-button>
    
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
                @if($group->pivot->role === "admin")
                    <x-button class="mt-4">Manage Group</x-button>
                @endif
            </x-directory-card>
        @endforeach       

    <x-modal title="hello there">some text</x-modal>
</div>
