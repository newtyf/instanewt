<article class="w-full px-20 text-white mt-4">
    <header class="w-full flex justify-between items-center py-3">
        <div class="flex flex-1 items-center">
            <div class="w-8 rounded-full overflow-hidden">
                <img src="https://newtyf.com/profile.webp"
                    alt="" class="object-cover aspect-square">
            </div>
            <div class="ml-2">
                <h2 class="text-sm"><a href="">emiratesfacup</a><span class="ml-2 font-bold">&#183; 5h</span></h2>
            </div>
        </div>
        <div>
            <button>...</button>
        </div>
    </header>
    <section class="border-gray-300 flex items-center mb-2">
        <img src="https://images.unsplash.com/photo-1603486002664-a7319421e133?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8MTYlM0E5fGVufDB8fDB8fHww"
            alt="" class="w-full h-full object-contain">
    </section>
    <div class="flex mb-2">
        <button title="like" onclick="likePost(this)"><i data-liked=0 class="bi bi-heart text-2xl duration-200"></i></button>
    </div>
    <p class="text-sm mb-2"><a href="">48,54549 likes</a></p>
    <section class="pb-6 border-b border-gray-500">
        <p class="text-sm"><a href="#"><span class="font-bold">emiratesfacup</span></a> Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Aperiam sunt natus culpa, sit quo officiis explicabo odit obcaecati eligendi pariatur repellat nesciunt
            ipsum error odio nisi distinctio suscipit maiores quas?</p>
    </section>
</article>

<script>
    function likePost(element) {
        const icon = element.querySelector("i");
        if (icon.dataset.liked == 0) {
            icon.classList.replace("bi-heart", "bi-heart-fill")
            icon.classList.toggle("text-red-500")
            icon.dataset.liked = 1;
        } else {
            icon.classList.replace("bi-heart-fill", "bi-heart")
            icon.classList.toggle("text-red-500")
            icon.dataset.liked = 0;
        }
    }
</script>
