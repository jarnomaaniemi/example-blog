<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 lg:mt-20 space-y-6">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register</h1>
                <form action="/register" method="post">
                    @csrf {{-- Hidden input --}}

                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />

                    <div class="mb-6">
                        <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700">
                            Register
                        </button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
