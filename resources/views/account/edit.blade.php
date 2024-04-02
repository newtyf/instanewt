<x-layouts.app title="Edit account">
    @if (session('status'))
        <div class="w-full bg-green-600 pl-2 text-white">
            <p class="font-bold text-sm">{{ session('status') }}</p>
        </div>
    @endif
    <section class="px-8 md:mx-auto flex-1 mt-20">
        <article class="md:w-96 border border-neutral-600 text-white py-10">
            <form action="{{ route('account.edit') }}" method="POST" enctype="multipart/form-data" class="px-6">
                @csrf
                <div class="mb-4">
                    <uploadprofile photo="{{auth()->user()->photoUrl}}" />
                    @error('upload')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name">
                        <p class="text-left text-sm mb-2">Name:</p>
                        <input id="name" name="name" type="text"
                            class="w-full text-sm outline-none bg-neutral-800 p-1" placeholder="name"
                            value="{{ auth()->user()->name }}" autofocus>
                    </label>
                    @error('username')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="biography">
                        <p class="text-left text-sm mb-2">Biography:</p>
                        <textarea id="biography" name="biography" type="text"
                            class="w-full text-sm outline-none bg-neutral-800 p-1 resize-none hover:resize-y" placeholder="Biography" autofocus>{{ auth()->user()->biography }}</textarea>
                    </label>
                    @error('biography')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                    @error('credentials')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 w-full py-1 rounded-md text-sm mb-4">Update</button>
            </form>
            </p>
        </article>
        <footer class="flex justify-center my-10 text-white">
            <h2>Instanewt</h2>
        </footer>
    </section>
</x-layouts.app>
