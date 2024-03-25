<x-layouts.app title="Home">
    <section class="w-full max-w-screen-lg mx-auto p-6">
        <article class="flex flex-col md:flex-row text-white max-w-screen-md md:p-6 md:pl-14 mb-8">
            <div class="w-32 md:w-1/4 md:h-1/4">
                <img src="https://newtyf.com/profile.webp"
                    class="w-full h-full object-cover aspect-square rounded-full pointer-events-none" alt="">
            </div>
            <div class="md:w-3/4 mt-10 md:mt-0 md:ml-20">
                <div class="mb-4 flex items-center">
                    <p class="text-xl">newtyf</p>
                    @if (auth()->check() && auth()->user()->username == $user)
                        <a href="{{route('settings', ['user' => auth()->user()->username])}}"
                            class="ml-4 bg-neutral-700 hover:bg-neutral-800 duration-200 rounded-md px-2 py-1">Edit
                            profile</a>
                        <a href="{{ route('settings', ['user' => auth()->user()->username]) }}"
                            class="text-white hover:bg-white hover:bg-opacity-15 rounded-md flex items-center justify-center p-2 py-1 ml-2"
                            title="go to the settings">
                            <i class="bi bi-gear-wide text-xl"></i></a>
                    @else
                        <button
                            class="ml-4 bg-blue-500 hover:bg-blue-600 duration-200 rounded-md px-2 py-1">Follow</button>
                    @endif
                </div>
                <ul class="flex mb-2">
                    <li class="mr-6">3 posts</li>
                    <li class="mr-6"><a href="">162 followers</a></li>
                    <li class="mr-6"><a href="">114 following</a></li>
                </ul>
                <p class="text-sm mb-2">𝓝𝓮𝔀𝓽 yf 🪐</p>
                <p class="text-sm">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium corporis nulla rem accusantium
                    esse excepturi quidem impedit, doloribus eveniet, earum magni cumque nostrum! Explicabo accusantium
                    corrupti vero, necessitatibus ducimus expedita?
                </p>
            </div>
        </article>
        <div class="w-full h-[0.5px] bg-neutral-700"></div>
        <nav class="flex justify-center">
            <ul>
                <li class="text-white p-3 border-t-2 text-xs"><a href=""><i
                            class="bi bi-grid-3x3 mr-2"></i>POSTS</a></li>
            </ul>
        </nav>
        <section class="grid grid-cols-3 gap-1">
            <x-common.post />
            <x-common.post />
            <x-common.post />
            <x-common.post />
            <x-common.post />
            <x-common.post />
        </section>
    </section>
</x-layouts.app>
