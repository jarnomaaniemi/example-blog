@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-bold border-b pb-4">
        {{ $heading }}
    </h1>

    <div class="flex mt-10">
        <aside class="w-48">
            <h4 class="mb-4 font-semibold uppercase">Links</h4>
            <ul>
                <li><a href="/admin/posts"
                        class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Manage Posts</a></li>
                <li><a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a></li>
            </ul>
        </aside>

        <main class="mx-auto space-y-6 flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
