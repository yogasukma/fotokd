<div class="popup" @if(!$showPopup) style="display: none" @endif>

    @if(!is_null($post))

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div style="max-width: 80%" class="min-h-96 m-auto bg-white rounded relative">
        <header class="p-5 flex justify-between items-center sticky top-0 left-0 bg-white w-full">
            <div>
                <h2 class="font-bold">{{ $post->title }}</h2>
                <span class="text-sm">Foto: {{ $post->media[0]->author }}</span>
            </div>
            <div>
                <a href="{{ $post->url . "?utm_source=fotokd.yogasukma.com" }}" target="_blank" class="bg-green-600 p-3 rounded text-white text-sm">Buka di katadata.id</a>
                <a href="#" wire:click='closePopup' class="border border-red-600 p-3 rounded text-red-600 text-sm">Tutup</a>
            </div>
        </header>
        <div class="photos">
            @foreach($post->media as $media)
            <figure>
                <img src="{{ $media->permalink }}" alt="{{ $media->description }}">
                <figcaption class="p-5">{{ $media->description }}</figcaption>
            </figure>
            @endforeach
        </div>

        <div>
            <div class="description"></div>
        </div>
    </div>

    @endif

</div>
