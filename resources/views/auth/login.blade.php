<x-layouts.auth title="Login">
    <section class="flex flex-1 items-center">
        <article class="w-1/2 h-3/5 relative hidden md:block">
            <img src="images/screenshot4.png" alt="" class="w-full h-full object-contain absolute">
            <img src="images/screenshot3.png" alt="" class="w-full h-full object-contain absolute top-8 left-12">
        </article>
        <article class="mx-4 md:mx-auto w-full md:w-1/2 border border-neutral-600 text-white text-center py-10">
            <h1 class="text-3xl mb-4">Instanewt</h1>
            <form action="{{ route('login') }}" method="post" class="px-14">
                @csrf
                <div class="mb-4">
                    <input name="username" type="text" class="w-full text-sm outline-none bg-neutral-800 p-1"
                        placeholder="Username" value="newt-yf" autofocus>
                    @error('username')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <input name="password" type="password" class="w-full text-sm outline-none bg-neutral-800 p-1 "
                        placeholder="Password" value="12345678">
                    @error('password')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                    @error('credentials')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 w-full py-1 rounded-md text-sm mb-4">Log in</button>
            </form>
            <p class="text-xs">Not have an account? <a href="{{route("register")}}" class="text-blue-500">Sign Up</a></p>
        </article>
    </section>
</x-layouts.auth>
