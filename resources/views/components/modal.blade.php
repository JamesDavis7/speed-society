@props([
    'title' => 'Modal Title',
    'name' => null,
    'show' => null,
    'onClose' => ''
])

<div class="fixed inset-0 flex items-center justify-center w-full h-full" 
    x-show="{{ $show ?? 'open' }}"
    x-cloak>
    <div class="fixed inset-0 w-full bg-black opacity-50"></div>
    <div class="absolute z-50 w-full max-w-2xl p-4 bg-white rounded">
        <div class="flex items-center justify-between">
            <h1 class="mb-2 text-2xl font-bold">{{ $title }}</h1>
            <x-button x-on:click="open = false" x-on:click="{{ $show }} = false; {{ isset($onClose) ? $onClose : '' }}">Close</x-button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>