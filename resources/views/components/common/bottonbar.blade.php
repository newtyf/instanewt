<nav class="md:hidden h-20 flex border-t-2 border-neutral-700">

    <ul class="flex flex-1 justify-around items-center">
        <li>
            <a href="{{ route('feed') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 rounded-md flex items-center justify-center"
                title="go to the feed"><i
                    class="text-3xl bi @if (request()->routeIs('feed')) bi-house-door-fill @else bi-house-door @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('posts.create') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center"
                title="go to the feed"><i
                    class="text-2xl bi @if (request()->routeIs('posts.create')) bi-plus-square-fill @else bi-plus-square @endif"></i></a>
        </li>
        <li>
            <a href="{{ route('account.profile', ['user' => auth()->user()->username]) }}"
                class="text-white hover:bg-white hover:bg-opacity-15 hover:scale-105 rounded-md flex items-center justify-center">
                <div class="rounded-full w-9 h-9 overflow-hidden">
                    <img src="@if (!auth()->user()->photoUrl) /images/profile-photo.webp @else {{ auth()->user()->photoUrl }} @endif"
                        alt="" class="w-full h-full object-cover">
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('account.settings') }}"
                class="text-white hover:bg-white hover:bg-opacity-15 rounded-md flex items-center justify-center"
                title="go to the settings">
                <i class="bi bi-gear-wide text-3xl"></i></a>
        </li>
    </ul>
</nav>
