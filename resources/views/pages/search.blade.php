

<x-layout>
    <h1 class="text-3xl font-bold">
        Search
    </h1>

    <div x-data="{
            results: null,
            searchParams: new URLSearchParams(location.search),
            endpoint: @js(Jocko::searchUrl('posts')),
            apiKey: @js(Jocko::apiKey())
        }"
        x-init="results = await fetch(`${endpoint}?${searchParams}`, {
            headers: {
                Accept: 'application/json, */*',
                Authorization: `Bearer ${apiKey}`
            }
        }).then(response => response.ok ? response.json() : null)"
    >
        <form method="GET">
            <label for="search">Search posts</label>
            <input type="search" name="query" id="search" :value="searchParams.get('query')" autocomplete="off">

            <input type="submit" value="Search">
        </form>

        <ul>
            <template x-for="post in results?.data">
                <li>
                    <a :href="`/posts/${post.id}`">
                        <span x-text="post.title"></span>
                    </a>
                </li>
            </template>
        </ul>

        <template x-if="results">
            <div style="display: flex; gap: 1rem" x-data="{ url: link => link.url ? new URL(link.url).search : null }">
                <a :href="url(results.links[0])">
                    &lt;
                </a>
                <template x-for="link in results.links.slice(1, -1)">
                    <a :href="url(link)" x-html="link.label"></a>
                </template>
                <a :href="url(results.links[results.links.length - 1])">
                    &gt;
                </a>
            </div>
        </template>
    </div>
</x-layout>
