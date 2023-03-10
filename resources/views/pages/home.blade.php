
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

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
