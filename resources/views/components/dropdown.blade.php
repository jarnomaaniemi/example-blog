@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Dropdown links --}}
    <div x-show="show" 
        class="py-2 absolute w-full bg-gray-100 rounded-xl mt-1 z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>
