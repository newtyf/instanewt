<template>
  <input id="upload" name="upload" type="file" class="hidden" accept="image/*" />
  <div id="image-preview"
    class="w-full h-full border-2 border-dashed border-blue-500 hover:bg-blue-950 rounded-md cursor-pointer p-4">
    <label for="upload" class="cursor-pointer w-full h-full flex flex-col items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-8 h-8 text-gray-500 mx-auto -mt-4">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <h5 class="text-md font-bold tracking-tight text-gray-200">Upload picture</h5>
      <p class="font-normal text-xs text-gray-300 ">photo should be in <b class="text-gray-500">JPG, PNG, or GIF</b>
        format.</p>
      <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
    </label>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';

onMounted(() => {
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
})
</script>

<style lang="scss" scoped></style>