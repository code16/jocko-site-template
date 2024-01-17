

@php
/**
 * @var \App\Models\Post $post
 */
@endphp


<x-layout>
    <h1 class="text-3xl font-bold">
        {{ $post->title }}
    </h1>

    @if($post->cover)
        <img src="{{ $post->cover->thumbnail(500, 500) }}" alt="{{ $post->title }}">
    @endif

    <x-content>
        <x-jocko-content :image-thumbnail-width="1024">
            <x-jocko-content::attributes component="jocko-image" class="w-100" />
            {!! $post->content !!}
        </x-jocko-content>
    </x-content>

    @if(count($post->visuals ?? []))
        <div class="flex gap-4 mt-16 flex-wrap">
            @foreach($post->visuals as $visual)
                <img src="{{ $visual->thumbnail(150) }}" alt="">
            @endforeach
        </div>
    @endif
</x-layout>
