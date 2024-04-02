<script setup>
const { post, currentUser } = defineProps(['post', 'currentUser'])

import { computed, ref } from "vue";
import { calculateRelativeDifference } from "../../../helper/RelativeTime"

const liked = ref(post.liked_by_user)
const likes = ref(post.likes)

const formateDate = computed(() => {
  const clientTime = new Date(post.created_at)
  return calculateRelativeDifference(clientTime)
})

const likePost = async () => {

  const data = {
    user_id: currentUser.id,
    post_id: post.id,
  }

  if (!liked.value) {
    console.log("a")
    await axios.post("/likes", {
      ...data
    })
    liked.value = true
    likes.value = likes.value + 1
  } else {
    await axios.delete("/likes", {
      data
    })
    likes.value = likes.value - 1
    liked.value = false
  }


}

</script>

<template>
  <article class="w-full px-10 md:px-20 text-white mt-4">
    <header class="w-full flex justify-between items-center py-3">
      <div class="flex flex-1 items-center">
        <div class="w-8 rounded-full overflow-hidden">
          <img :src="(!post.user.photoUrl) ? '/images/profile-photo.webp' : post.user.photoUrl" alt=""
            class="object-cover aspect-square">
        </div>
        <div class="ml-2">
          <h2 class="text-sm"><a :href="post.user.username">{{
            post.user.username }}</a><span class="ml-1 font-bold">&#183;</span><span id="created-time"
              class="ml-1 font-bold text-xs">{{ formateDate }}</span></h2>
        </div>
      </div>
      <div>
        <button>...</button>
      </div>
    </header>
    <section class="border-gray-300 flex items-center mb-2">
      <img :src="post.photoUrl" alt="" class="w-full h-full object-contain">
    </section>
    <div class="flex mb-2">
      <button title="like" @click="likePost"><i
          :class="'bi text-2xl duration-200 ' + (liked ? 'bi-heart-fill text-red-500' : 'bi-heart')"></i></button>
    </div>
    <p class="text-sm mb-2"><a href="#">{{ likes }} likes</a></p>
    <section class="pb-6 border-b border-gray-500">
      <p class="text-sm whitespace-pre"><a :href="post.user.username"><span class="font-bold">{{ post.user.username
            }}</span></a> {{
            post.description }}
      </p>
    </section>
  </article>
</template>