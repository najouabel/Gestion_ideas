<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @yield('css')
      @vite('resources/css/app.css')
      

    </head>
    <body  style="">
      <script defer="" src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
      <style>
      
          .hover-image-1{
              transition: ease-in-out 0.2s;
          }
          .hover-image-1:hover{
              width: 50px;
              height: 50px;
          }
      
      </style>
          <div class="flex h-screen   " :class="{ 'overflow-hidden': isSideMenuOpen}">
            <!-- Desktop sidebar -->
            <aside class="z-20 hidden w-60 overflow-y-auto  md:block flex-shrink-0">
             
       <div class=" mt-28 p-1 flex justify-center">
             <a href="{{ route('posts.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                </a>
      
              </div>
              <div class="">
                @if (Route::has('login'))
                    <div class="">
                        @auth
               <div class=" my-2 p-2 flex justify-center">
                  <a href="{{ route('posts.profile') }}" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">{{ Auth::user()->name }} </span>
                </a>
              </div>
              <form  action="{{ route('logout') }}" method="POST">
                @csrf
              <div class=" my-2 p-2 flex justify-center">
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate" onclick="event.preventDefault(); this.closest('form').submit();" >LOGOUT </span>
              </a>
            </div>
          </form>
          @else
          <div class=" my-2 p-2 flex justify-center">
            <a href="{{ route('login') }}" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">LOGIN </span>
          </a>
        </div>
          @if (Route::has('register'))
              <div class=" my-2 p-2 flex justify-center">
                <a href="{{ route('register') }}" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">REGISTRE </span>
              </a>
            </div>
              @endif
      @endauth
  </div>
@endif
               <div class=" my-2 p-2 flex justify-center">
                 <a href="{{ route('posts.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none  text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">create
                  </span>
                </a>
              </div>
      
            </aside>
            
          <div class="flex flex-col flex-1">
            <header class="z-10 py-4  shadow-xs ">
              <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600">
                <!-- Mobile hamburger -->
                <button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple">
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                  </svg>
                </button>
                
              </header>
              <main class="h-full pb-16 overflow-y-auto">
                <!-- Remove everything INSIDE this div to a really blank page -->
      
      <!-- Main Contents -->
      <div class="container">
        @yield('content')
    </div>
</body>
</html>