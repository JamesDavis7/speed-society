@props([
    'id' => null,
    'link' => null,
    'favouritable' => false,
    'title' => null,
    'description' => null,
    'image' => null,
    'href' => null,
    'action' => null
])

@if( $href )
<a href="{{ $href }}">
@endif
    <div {{ $attributes->merge(['class' => 'relative h-full p-4 overflow-hidden bg-white border border-black rounded']) }}>
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
                {{ $action }}
            </div>

        </div>
    
        <div class="absolute top-4 right-4">
            <div><i class="ri-arrow-up-line"></i>
            </div>
        </div>
    </div>
@if( $href )
</a>
@endif
