<nav class="h-full p-3 border-r w-min border-neutral-700 hidden md:flex flex-col justify-between">
    <ul class="flex flex-col items-center my-5">
        <li>
            <a href="{{ route('home') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="logo instanewt">
                <i class="bi-instagram text-xl"></i></a>
        </li>
    </ul>
    <ul class="flex flex-col flex-1 items-center">
        <li>
            <a href="{{ route('home') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2 mb-2"
                title="go to the home"><i class="text-2xl bi @if(request()->routeIs('home')) bi-house-door-fill @else bi-house-door @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('profile', ['user' =>  auth()->user()->username]) }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2 mb-2">
                <div class="rounded-full overflow-hidden">
                    <img src="https://newtyf.com/profile.webp"
                        alt="" class="object-cover aspect-square">
                </div>
            </a>
        </li>
    </ul>
    <ul class="flex flex-col items-center">
        <li>
            <a href="{{ route('settings', ['user' =>  auth()->user()->username]) }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="go to the settings">
                <i class="bi bi-gear-wide text-2xl"></i></a>
        </li>
    </ul>
</nav>
