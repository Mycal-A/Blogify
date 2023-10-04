<x-layout>

@if ($post)
        <article>
            <h1>
            {{$post->title }}
            </h1>

            <div>
            {!!$post->body!!}
            </div>
        </article>
    @else
        <p>Post not found.</p>
@endif

</x-layout>

    