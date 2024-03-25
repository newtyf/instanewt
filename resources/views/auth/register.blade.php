<x-layouts.auth title="Register">
    <section class="flex flex-1 items-center">
        <article class="w-1/2 h-3/5 relative hidden md:block">
            <img src="images/screenshot4.png" alt="" class="w-full h-full object-contain absolute">
            <img src="images/screenshot3.png" alt="" class="w-full h-full object-contain absolute top-8 left-12">
        </article>
        <article class="mx-4 md:mx-auto w-full md:w-1/2 border border-neutral-600 text-white text-center py-10">
            <h1 class="text-3xl mb-4 font-bold">Instanewt</h1>
            <form action="{{ route('register') }}" method="post" class="px-14">
                @csrf
                <div class="mb-4">
                    <input name="name" type="text" class="w-full text-sm outline-none bg-neutral-800 p-1 px-2"
                        placeholder="Jhoe" value="{{old('name')}}" autofocus>
                    @error('name')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <input name="username" type="text" class="w-full text-sm outline-none bg-neutral-800 p-1 px-2"
                        placeholder="Doe_jhoe" value="{{old('username')}}">
                    @error('username')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <input name="email" type="email" class="w-full text-sm outline-none bg-neutral-800 p-1 px-2"
                        placeholder="correo@mail.com" value="{{old('email')}}">
                    @error('email')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <input name="password" type="password" class="w-full text-sm outline-none bg-neutral-800 p-1 px-2"
                        placeholder="Password" value="{{old('password')}}">
                    @error('password')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <input name="password_confirmation" type="password" class="w-full text-sm outline-none bg-neutral-800 p-1 px-2"
                        placeholder="Password" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 w-full py-1 rounded-md text-sm mb-4">Sign Up</button>
            </form>
            <p class="text-xs">Have an account? <a href="{{ route('login') }}" class="text-blue-500">Sign in</a></p>
        </article>
    </section>
</x-layouts.auth>
