@extends('posts.layout')
@section('content')

<br>

    <div class="block md:grid md:grid-flow-row-dense md:grid-cols-3 md:grid-rows-3 ">
     <div class="col-span-2">
        
        @if (Route::has('login'))
        @auth
        <div class="pt-10">
    <form class="bg-white shadow rounded-lg mb-6 p-4 w-full md:w-3/4" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf 
        
        <input name="details" type="text" placeholder="Type something..." class=" focus:outline-none  w-full rounded-lg p-2 text-sm  border border-transparent appearance-none rounded-tg placeholder-gray-400">
        <input type="hidden" type="text" name="name" value="{{ Auth::user()->name }}" class=" focus:outline-none  w-full rounded-lg p-2 text-sm  border border-transparent appearance-none rounded-tg placeholder-gray-400">
                <footer class="flex justify-between mt-2">
                    <div class="flex gap-2">
                        <span class="flex items-center transition ease-out duration-300 hover:bg-blue-500 hover:text-white bg-blue-100 w-8 h-8 px-2 rounded-full text-blue-400 cursor-pointer">
                            <svg  viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <input class="flex items-center transition ease-out duration-300 hover:bg-blue-500 hover:text-white bg-blue-100 w-8 h-8 px-2 rounded-full text-blue-400 cursor-pointer" name="image" type="file" placeholder="******************">
          
                        </span>
                        
                    </div>
                    <button type="submit" class="flex items-center py-2 px-4 rounded-lg text-sm bg-blue-600 text-white shadow-lg">Post
                        <svg class="ml-1" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </footer>
            </form>
    </div>
    @endauth
    @endif
    @foreach ( $posts as $item)
                <div class="bg-white shadow rounded-lg mt-10 ">
                    <div class="flex flex-row px-2 py-3 mx-3">
                        <div class="w-auto h-auto rounded-full border-2 border-green-500">
                            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="https://images.unsplash.com/photo-1533113354171-490d836238e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class="text-gray-600 text-sm font-semibold">{{$item->name}}</div>
                            <div class="flex w-full mt-1">
                               
                                <div class="text-gray-400 font-thin text-xs">
                                    • {{$item->updated_at->diffForHumans() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=""></div>
                    <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
                        <img class="rounded w-full" src="images/{{$item->image}}">
                    </div>
                    <div class="text-gray-500 text-sm mb-6 mx-3 px-2">{{$item->details}}</div>
                    {{-- <div class="flex justify-start mb-4 ">
                        <div class="flex w-full mt-1 pt-2 pl-5">
                            <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                            </svg>
                            </div>
                        
                    </div> --}}
                    {{-- <div class="flex w-full ">
                        <div class="mt-3 mx-5 flex flex-row text-xs">
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Likes:<div class="ml-1 text-gray-400 text-ms"> 30</div></div>
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Comments: <div class="ml-1 text-gray-400 text-ms"> 60k</div></div>
                        </div>
                        
                    </div> --}}
                    
                    @auth
                    <div class="relative flex items-center self-center w-full max-w-xl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
                        <img class="w-10 h-10 object-cover rounded-full shadow mr-2 cursor-pointer" alt="User avatar" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2000&amp;q=80">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-6">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-none hover:text-blue-500">
                            <svg class="w-6 h-6 transition ease-out duration-300 hover:text-blue-500 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
    
                            </button>
                        </span>
                        <form action="{{ route('commentaire.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        
                            <input type="search" name='body' class="w-full py-2 pl-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue" style="border-radius: 25px" placeholder="Post a comment..." autocomplete="off">
                            <input type="hidden" name='post_id' value="{{$item->id}}" >
                        </form>
                        </div>

                    @endauth
                </div>
                @endforeach
     </div>
     <div class="hidden md:block lg:block py-12  sticky top-6">
  
      <input type="search" class="ml-16 w-3/4 py-2 pl-4 px-4 pr-10 text-sm bg-gray-100 border border-transparent appearance-none rounded-tg placeholder-gray-400 focus:bg-gray-50 focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue" style="border-radius: 25px" placeholder="Search" autocomplete="off">
    <card class=" w-96 rounded-lg shadow-lg">
    
        <header class="font-bold text-2xl px-5 py-4">
          Who to follow
        </header>
    
        <main class="px-5">
    
          <content class="grid grid-cols-6">
    
            <div class="">
              <img src="https://picsum.photos/200/200" class="h-8 w-8 rounded-full">
            </div>
    
            <div class="col-span-3 px-1 font-semibold flex flex-col">
              <div class="text-sm"> Sangwa Albine </div>
              <div class="text-xm text-gray-700 font-light"> @__svngwa._ </div>
            </div>
    
            <div class="col-span-2 py-2 justify-self-end">
              <button class=" text-blue-500 text-xs font-semibold text-md rounded-full py-1 px-4">
                .Follow
              </button>
            </div>
    
          </content>
    
    
             <content class="grid grid-cols-6 mt-6">
    
            <div class="">
              <img src="https://picsum.photos/200/200?i=200" class="h-8 w-8 rounded-full">
            </div>
    
            <div class="col-span-3 px-1 font-semibold flex flex-col ">
              <div class="text-sm"> Mbonyintege </div>
              <div class="text-xm text-gray-700 font-light"> @Cpwr</div>
            </div>
    
            <div class="col-span-2 py-2 justify-self-end">
              <button class=" text-blue-500 text-xs font-semibold text-md rounded-full py-1 px-4">
                .Follow
              </button>
            </div>
    
          </content>
    
    
        </main>
    
      </card>
    
      <div class="max-w-sm rounded-lg overflow-hidden shadow-sm m-4 mt-5">
    
        <!--first trending tweet-->
        <div class="flex">
            <div class="flex-1">
                <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">1 . Trending</p>
                <h2 class="px-4 ml-2 w-48 font-bold ">#Microsoft363</h2>
                <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">5,466 posts</p>
    
            </div>
            <div class="flex-1 px-4 py-2 m-2">
                <a href="" class=" text-2xl rounded-full text-gray-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        </div>
    
    
        <!--second trending tweet-->
    
        <div class="flex">
            <div class="flex-1">
                <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">2 . Politics . Trending</p>
                <h2 class="px-4 ml-2 w-48 font-bold ">#HI-Fashion</h2>
                <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">8,464 posts</p>
    
            </div>
            <div class="flex-1 px-4 py-2 m-2">
                <a href="" class=" text-2xl rounded-full text-gray-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        </div>
    
    
        <!--third trending tweet-->
    
        <div class="flex">
            <div class="flex-1">
                <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400">3 . Rock . Trending</p>
                <h2 class="px-4 ml-2 w-48 font-bold ">#Ferrari</h2>
                <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">5,586 Concepts</p>
    
            </div>
            <div class="flex-1 px-4 py-2 m-2">
                <a href="" class=" text-2xl rounded-full text-gray-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        </div>
    
    </div>
      </div>
    </div>
  
        </main>
      </div>
        </div>
  </body> @endsection 