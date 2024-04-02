<nav class="p-4 flex justify-between">
  <ul>
      <li class="text-white"><a href="{{ route('feed') }}">Instanewt</a></li>
  </ul>
  <ul class="flex">
      <li class="text-white">
          <a href="{{ route('login') }}"
              class="ml-4 bg-blue-500 hover:bg-blue-600 duration-200 rounded-md px-2 py-1">Log
              in</a>
      </li>
      <li class="text-blue-500">
          <a href="{{ route('register') }}"
              class="ml-4 duration-200 rounded-md px-2 py-1 hover:bg-blue-950">Sign
              Up</a>
      </li>
  </ul>
</nav>