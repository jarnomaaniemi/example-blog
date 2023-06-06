@props(['comment'])

<article class="flex p-6 bg-gray-100 border border-gray-200 rounded-xl space-x-3">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->author->username }}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header>
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
            <p class="mt-2">
                {{ $comment->body }}
            </p>
        </header>
    </div>
</article>
