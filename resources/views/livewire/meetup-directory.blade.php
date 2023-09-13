<div>
    <div class="flex flex-col gap-4">
        @foreach($meetups as $meetup)
            <x-directory-card 
                :title="$meetup->title" 
                :description="$meetup->description"
                :image="$meetup->thumbnail"
            >
            <div class="p-4">
                <p><span class="font-semibold">Date:</span> {{ $meetup->time }}</p>
                <p><span class="font-semibold">Category:</span> {{ ucfirst(strtolower($meetup->category)) }}</p>
                <p><span class="font-semibold">Meetup Organiser:</span> {{ $meetup->user->name }}</p>

            </div>
            </x-directory-card>
        @endforeach

        {{ $meetups->links() }}

    </div>
</div>
