
@php
/**
 * @var \App\Models\Page $page
 */
@endphp

<x-layout>
    <h1 class="text-3xl font-bold">
        {{ $page->title }}
    </h1>

    <x-content class="my-4">
        {!! $page->content !!}
    </x-content>

    <div>
        <a href="{{ route('posts.index', absolute: false) }}">See all posts</a>
    </div>
</x-layout>
