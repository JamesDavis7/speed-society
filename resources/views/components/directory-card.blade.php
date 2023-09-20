@props([
    'id' => null,
    'link' => null,
    'favouritable' => false,
    'title' => null,
    'description' => null,
    'image' => null,
    'href' => null
])

<a href="{{ $href }}">
    <div class="relative p-4 overflow-hidden bg-white border border-black rounded">
        <div class="flex flex-col gap-4 md:flex-row">
            @if($image)
                <img src="{{ $image }}" alt="directory-card-image" class="w-full max-w-[12.5rem] h-full rounded">
            @endif
            <div>
                <h3 class="text-xl font-semibold">{{ $title }}</h3>
                <p class="text-sm">{{ $description }}</p>
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    
        <div class="absolute top-4 right-4">
            <div><i class="ri-arrow-up-line"></i>
            </div>
        </div>
    </div>
</a>