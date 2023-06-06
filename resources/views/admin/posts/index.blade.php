<x-layout>
    <x-setting heading="Manage Posts">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($posts as $post)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://i.pravatar.cc/60?u={{ $post->author->username }}"
                        alt="">
                    <div class="min-w-0 flex-auto">
                        <a href="/posts/{{ $post->slug }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $post->title}}</a>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Published {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <a href="/admin/posts/{{ $post->slug }}/edit" class="text-sm leading-6 text-blue-500">Edit</a>
                    <form action="/admin/posts/{{ $post->slug }}" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <button href="/admin/posts/{{ $post->slug }}" class="mt-1 text-xs leading-5 text-gray-500">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>

    </x-setting>
</x-layout>
