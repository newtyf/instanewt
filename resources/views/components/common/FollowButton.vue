<template>
  <button v-if="followed" class="ml-4 bg-neutral-700 hover:bg-neutral-800 duration-200 rounded-md px-2 py-1"
    @click="removeFollow">Following</button>
  <button v-else class="ml-4 bg-blue-500 hover:bg-blue-600 duration-200 rounded-md px-2 py-1"
    @click="giveFollow">Follow</button>
</template>

<script setup>
import { ref } from "vue"

const { following, follower, isFollowedByMe } = defineProps(['following', 'follower', 'is-followed-by-me'])

const followed = ref(isFollowedByMe)

const data = {
  follower_id: follower,
  following_id: following,
}

const giveFollow = async () => {

  try {
    const response = await axios.post("/follow", {
      ...data
    })
    // location.reload()
    followed.value = true
  } catch (error) {
    console.log(error)
  }
}

const removeFollow = async () => {
  try {
    const response = await axios.delete("/follow", {
      data
    })
    // location.reload()
    followed.value = false
  } catch (error) {
    console.log(error)
  }
}

</script>