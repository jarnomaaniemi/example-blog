@auth
    <form action="/posts/{{ $post->slug }}/comments" method="post" class="border border-gray-200 rounded-xl p-6">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->user()->username }}" alt="" width="60" height="60"
                class="rounded-xl">

            <h2 class="ml-3">Want to participate to the discussion?</h2>
        </header>
        <div class="mt-4">
            <textarea name="body" id="body" rows="4" class="w-full p-3" placeholder="Your comment here" required></textarea>
            @error('body')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-2 border-t border-gray-200 pt-3">
            <x-submit-button>Post</x-submit-button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline text-blue-500">Register</a> or <a href="/login"
            class="hover:underline text-blue-500">login</a> to leave a comment.
    </p>
@endauth
