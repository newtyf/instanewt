<x-layouts.app title="Create post">
    @if (session('status'))
        <div class="w-full bg-green-600 pl-2 text-white">
            <p class="font-bold text-sm">{{ session('status') }}</p>
        </div>
    @endif
    <section class="flex-1 mx-auto mt-10">
        <article class="w-full border border-neutral-600 text-white py-6 px-4">
            <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col md:flex-row w-full">
                @csrf
                <div class="w-full md:w-2/3 pl-2 pr-4 h-80">
                    <upload />
                    @error('upload')
                        <small class="font-bold text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 flex flex-col mt-5 md:mt-0">
                    <div class="mb-4 flex-1">
                        <label for="description">
                            <p class="text-left text-sm mb-2">Description:</p>
                            <textarea id="description" name="description" type="text"
                                class="w-full text-sm outline-none bg-neutral-800 p-1 resize-none min-h-32 max-h-40 hover:resize-y " placeholder="description" autofocus>{{ auth()->user()->description }}</textarea>
                        </label>
                        @error('description')
                            <small class="font-bold text-red-500">{{ $message }}</small>
                        @enderror
                        @error('credentials')
                            <small class="font-bold text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 w-full py-1 rounded-md text-sm">Post</button>
                </div>
            </form>
        </article>
        <footer class="flex justify-center my-10 text-white">
            <h2>Instanewt</h2>
        </footer>
    </section>
    <script>
        const uploadInput = document.getElementById('upload');
        const imagePreview = document.getElementById('image-preview');

        // Check if the event listener has been added before
        let isEventListenerAdded = false;

        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="w-full h-full object-contain rounded-md" alt="Image preview" />`;

                    // Add event listener for image preview only once
                    if (!isEventListenerAdded) {
                        imagePreview.addEventListener('click', () => {
                            console.log("a")
                            uploadInput.click();
                        });

                        isEventListenerAdded = true;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML =
                    `<div class="bg-gray-800 w-full h-full rounded-md flex items-center justify-center text-gray-300">No image preview</div>`;

                // Remove the event listener when there's no image
                imagePreview.removeEventListener('click', () => {
                    uploadInput.click();
                });

                isEventListenerAdded = false;
            }
        });

        uploadInput.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    </script>
</x-layouts.app>
