


<x-layout>
    <h1 class="text-3xl font-bold">
        Posts
    </h1>

    <div>
        <a href="{{ route('posts.index', absolute: false) }}">reset</a>
        <a href="{{ route('posts.index.filter', ['length' => 'small', 'alpha' => $alpha], absolute: false) }}">small</a>
        <a href="{{ route('posts.index.filter', ['length' => 'long', 'alpha' => $alpha], absolute: false) }}">long</a>
        <a href="{{ route('posts.index.filter', ['length' => $length, 'alpha' => 'a-m'], absolute: false) }}">a-m</a>
        <a href="{{ route('posts.index.filter', ['length' => $length, 'alpha' => 'n-z'], absolute: false) }}">n-z</a>
    </div>

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post, absolute: false) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}
</x-layout>
