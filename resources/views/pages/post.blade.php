

@php
/**
 * @var \App\Models\Post $post
 */
@endphp

<x-layout>
    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>

{{--    @if($page->cover)--}}
{{--        <img src="{{ $page->cover->thumbnail(500, 500) }}" alt="{{ $post->title }}">--}}
{{--    @endif--}}

    <x-content :image-thumbnail-width="1024">
        {!! $post->content !!}
    </x-content>

{{--    @if(count($page->visuals ?? []))--}}
{{--        <div class="flex gap-4 mt-16 flex-wrap">--}}
{{--            @foreach($page->visuals as $visual)--}}
{{--                <img src="{{ $page->image($visual)->thumbnail(150) }}" alt="">--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}
</x-layout>
