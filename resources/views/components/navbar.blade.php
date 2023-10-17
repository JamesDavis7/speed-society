<div class="w-full text-black bg-white border-b border-gray-300">
    <nav class="container flex items-center justify-between mx-auto text-black">
        <div class="flex items-center gap-6">
            <a href="{{ route('meetups.index') }}" class="py-4" wire:navigate>
                <span>Meetups</span>
            </a>
            <a href="{{ route('groups.index') }}" class="py-4" wire:navigate>
                <span>Groups</span>
            </a>        
        </div>
        <a href="#" class="py-4" wire:navigate>
            <span>Profile</span>
        </a>   
    </nav>
</div>
