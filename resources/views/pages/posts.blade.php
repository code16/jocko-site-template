


<x-layout>
    <h1 class="text-3xl font-bold">
        Posts
    </h1>

    <div>
        <a href="{{ route('posts.index') }}">reset</a>
        <a href="{{ route('posts.index.filter', ['length' => 'small', 'alpha' => $alpha]) }}">small</a>
        <a href="{{ route('posts.index.filter', ['length' => 'long', 'alpha' => $alpha]) }}">long</a>
        <a href="{{ route('posts.index.filter', ['length' => $length, 'alpha' => 'a-m']) }}">a-m</a>
        <a href="{{ route('posts.index.filter', ['length' => $length, 'alpha' => 'n-z']) }}">n-z</a>
    </div>

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}
</x-layout>