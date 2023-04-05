<x-dropdown>
    {{-- passed as a prop $trigger to dropdown component --}}
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        </button>
    </x-slot>

    {{-- passed as default $slot to component --}}
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}">All categories</x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
