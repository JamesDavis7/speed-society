@props([
    'title' => 'Modal Title',
    'name' => null
])

<div class="fixed inset-0 flex items-center justify-center w-full h-full" 
    x-data="{ 
        show: false,
        name: '{{ $name }}'
    }"
    x-on:open-modal.window="show = true"
    x-on:close-modal.window="show = false"
    x-show="show"
    x-cloak>
    <div class="fixed inset-0 w-full bg-black opacity-50"></div>
    <div class="absolute z-50 w-full max-w-2xl p-4 bg-white rounded">
        <div class="flex items-center justify-between">
            <h1 class="mb-2 text-2xl font-bold">{{ $title }}</h1>
            <x-button x-on:click="show = false">Close</x-button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>