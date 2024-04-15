<nav class="h-full p-3 border-r w-20 border-neutral-700 hidden md:flex flex-col justify-between">
    <ul class="flex flex-col items-center my-5">
        <li>
            <a href="{{ route('feed') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="logo Instanewt">
                <i class="bi-instagram text-xl"></i></a>
        </li>
    </ul>
    <ul class="flex flex-col flex-1 items-center space-y-2">
        <li>
            <a href="{{ route('search.index') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="go to the feed"><i
                    class="text-2xl bi @if (request()->routeIs('search')) bi-search-heart-fill @else bi-search @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('feed') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="go to the feed"><i
                    class="text-2xl bi @if (request()->routeIs('feed')) bi-house-door-fill @else bi-house-door @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('posts.create') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="go to the feed"><i
                    class="text-xl bi @if (request()->routeIs('posts.create')) bi-plus-square-fill @else bi-plus-square @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('account.profile', ['user' => auth()->user()->username]) }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center">
                <div class="rounded-full w-6 h-6 m-2 overflow-hidden">
                    <img src="@if (!auth()->user()->photoUrl) /images/profile-photo.webp @else {{ auth()->user()->photoUrl }} @endif"
                        alt="" class="w-full h-full object-cover">
                </div>
            </a>
        </li>
    </ul>
    <ul class="flex flex-col items-center">
        <li>
            <a href="{{ route('account.settings') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center p-2"
                title="go to the settings">
                <i class="bi bi-gear-wide text-2xl"></i></a>
        </li>
    </ul>
</nav>
