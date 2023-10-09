<x-layout>

    @if ($post)

    <article>
        <h1>
            {{ $post->title }}
        </h1>

        <p>
            By <a href="authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a
                href="/category/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        <div>
            {!!$post->body!!}
        </div>
    </article>

    @else
    <p>Post not found.</p>
    @endif

</x-layout>
