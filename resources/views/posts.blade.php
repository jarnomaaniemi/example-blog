@extends('layout')

@section('banner')
    <h1>Blog posts</h1>
@endsection

@section('content')
    {{-- Show all posts --}}
    @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">
                <h1>
                    {{ $post->title }}
                </h1>
            </a>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
