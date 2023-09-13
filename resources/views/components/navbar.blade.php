<div class="w-full text-black bg-white border-b border-gray-300">
    <nav class="container flex items-center justify-between h-16 mx-auto text-black">
        <a href="{{ route('pages.dashboard') }}">
            <span>{{ __('Speed Society') }}</span>
        </a>
        <div class="flex gap-4">
            <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
        </div>
    </nav>
</div>
