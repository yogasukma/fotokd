<div class="post-grid">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <figure wire:click='open({{ $post->id }})'>
            <img src="{{ $post->featuredMedia->permalink }}">
            <figcaption>{{ $post->title }}</figcaption>
        </figure>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $posts->render() }}
    </div>

    <livewire:post-popup />
</div>