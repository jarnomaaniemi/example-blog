<x-layout>
    <x-setting heading="Edit post: {{ $post->title }}">
        <form action="/admin/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('title', $post->slug)" />

            <div class="flex">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>
                <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl ml-6" width="25%">
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }} </x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }} </x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" class="border border-gray-200 p-2 w-full" required>

                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach

                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-submit-button>Update</x-submit-button>
        </form>
    </x-setting>
</x-layout>
