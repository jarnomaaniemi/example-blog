@props(['trigger'])

<div x-data="{ show: false }">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Dropdown links --}}
    <div x-show="show" @click.away="show = false" class="py-2 absolute w-full bg-gray-100 rounded-xl mt-1 z-50 overflow-auto max-h-52"
        style="display: none">
        {{ $slot }}
    </div>
</div>

{{-- Down arrow --}}
<svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22"
    viewBox="0 0 22 22">
    <g fill="none" fill-rule="evenodd">
        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
        </path>
        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
        </path>
    </g>
</svg>
