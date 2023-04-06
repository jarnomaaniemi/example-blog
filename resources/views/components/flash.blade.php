@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bottom-5 right-5 bg-green-300 rounded-xl py-3 px-5">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
