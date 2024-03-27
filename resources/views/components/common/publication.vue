<script setup>
import { ref } from 'vue'
const { post } = defineProps(['post'])
</script>

<template>
  <article class="w-full px-20 text-white mt-4">
    <header class="w-full flex justify-between items-center py-3">
      <div class="flex flex-1 items-center">
        <div class="w-8 rounded-full overflow-hidden">
          <img :src="(!post.user.photoUrl) ? '/images/profile-photo.webp' : post.user.photoUrl" alt=""
            class="object-cover aspect-square">
        </div>
        <div class="ml-2">
          <h2 class="text-sm"><a :href="post.user.username">{{
            post.user.username }}</a><span class="ml-1 font-bold">&#183;</span><span id="created-time"
              class="ml-1 font-bold text-xs">{{ post.created_at }}</span></h2>
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
      <button title="like" onclick="likePost(this)"><i data-liked=0
          class="bi bi-heart text-2xl duration-200"></i></button>
    </div>
    <p class="text-sm mb-2"><a href="#">{{ post.likes }} likes</a></p>
    <section class="pb-6 border-b border-gray-500">
      <p class="text-sm"><a :href="post.user.username"><span class="font-bold">{{ post.user.username }}</span></a> {{ post.description }}
      </p>
    </section>
  </article>
</template>