<x-layouts.app title="Settings">
    <section class="w-full mx-auto max-w-screen-sm text-center mt-10">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 rounded-md text-white p-2 py-1">Log out</button>
        </form>
    </section>
</x-layouts.app>
