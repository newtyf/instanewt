<x-layouts.app title="Instanewt">
    <section id="infinite-list" class="h-full overflow-y-auto pb-2">
        <publicationlist user="{{auth()->user()}}" />
    </section>
</x-layouts.app>