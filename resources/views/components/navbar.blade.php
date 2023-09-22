<div class="w-full text-black bg-white border-b border-gray-300">
    <nav class="container flex items-center justify-between h-16 mx-auto text-black">
        <a href="{{ route('pages.dashboard') }}">
            <span>{{ __('Speed Society') }}</span>
        </a>
        <div class="flex gap-6">
            <a href="{{ route('meetups.index') }}" wire:navigate>Meetups</a>
            <a href="{{ route('groups.index') }}" wire:navigate>Groups</a>
            <a href="{{ route('profile.edit') }}" wire:navigate>Profile</a>
        </div>
    </nav>
</div>
