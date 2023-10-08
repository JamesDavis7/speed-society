@props([
    'title' => 'Modal Title'
])

<div class="fixed inset-0 flex items-center justify-center w-full h-full" 
    x-show="open" 
    x-on:open-modal.window="open = true"
    x-data="{ open: false }"
    x-cloak>
    <div class="fixed inset-0 w-full bg-black opacity-50"></div>
    <div class="absolute z-50 w-full max-w-2xl p-4 bg-white rounded">
        <div class="flex items-center justify-between">
            <h1 class="mb-2 text-2xl font-bold">{{ $title }}</h1>
            <x-button x-on:click="open = false">Close</x-button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>