<x-layouts.app title="Settings">
    <section class="w-full flex-1 mx-auto max-w-screen-sm text-center mt-10">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 rounded-md text-white p-2 py-1">Log out</button>
            <footer class="flex justify-center my-10 text-white">
                <h2>Instanewt</h2>
            </footer>
        </form>
    </section>

</x-layouts.app>
