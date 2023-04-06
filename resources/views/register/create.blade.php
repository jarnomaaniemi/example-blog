<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form action="/register" method="post">
                @csrf {{-- Hidden input --}}

                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('name') }}">

                    @error('name')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full"
                        required value="{{ old('username') }}">

                    @error('username')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full"
                        required value="{{ old('email') }}">

                    @error('email')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full"
                        required>

                    @error('password')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700">
                        Register
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
