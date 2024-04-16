<x-layouts.app title="Search user">
    <section class="flex-1 text-white mt-20">
        <h1 class="text-2xl font-bold text-center mb-4">Search users by username</h1>

        <form class="max-w-md mx-auto" action="{{ route('search.index') }}" method="get">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="q" name="username"
                    class="block w-full p-4 ps-10 text-sm outline-none text-gray-300 rounded-lg bg-neutral-800 focus:outline-blue-500"
                    placeholder="Search Mockups, Logos..." value="{{ old('username') }}" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>

        @if ($accounts !== null)
            @if (count($accounts) !== 0)
                <div
                    class="w-full max-w-md mx-auto mt-4 p-4border border-gray-200 bg-neutral-800 rounded-lg shadow sm:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-white">Founded Users</h5>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($accounts as $account)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full object-cover"
                                                src="{{ $account->photoUrl }}" alt="Neil image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $account->username }}
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-sm font-semibold text-blue-700 ">
                                            <a href="{{ route('account.profile', ['user' => $account->username]) }}"
                                                class="hover:underline">visit</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p class="text-center mt-2">Not results...</p>
            @endif
        @else
            <div class="w-full max-w-md mx-auto mt-4 p-4border border-gray-200 bg-neutral-800 rounded-lg shadow sm:p-8">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-white">Founded Users</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full object-cover" src="{{url('storage/avatars/newt-yf.png')}}"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            newt-yf
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-sm font-semibold text-blue-700 ">
                                        <a href="{{ route('account.profile', ['user' => 'newt-yf']) }}"
                                            class="hover:underline">visit</a>
                                    </div>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        @endif

    </section>
</x-layouts.app>
