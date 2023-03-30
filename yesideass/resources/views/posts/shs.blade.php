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
    @foreach ( $post->comments as $item)
                <div class="bg-white shadow rounded-lg mt-10 ">
                    <div class="flex flex-row px-2 py-3 mx-3">
                        <div class="w-auto h-auto rounded-full border-2 border-green-500">
                            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="https://images.unsplash.com/photo-1533113354171-490d836238e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class="text-gray-600 text-sm font-semibold">{{$item->user->name}}</div>
                            <div class="flex w-full mt-1">
                               
                                <div class="text-gray-400 font-thin text-xs">
                                    • {{$item->updated_at}} 
                                </div>
                            </div>
                        </div>
                        <p>
                          {{ $item->body }}
                        </p>
                    </div>
                    
                    <div class="flex w-full ">
                        <div class="mt-3 mx-5 flex flex-row text-xs">
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Likes:<div class="ml-1 text-gray-400 text-ms"> 30</div></div>
                            <div class="flex text-gray-700 font-normal rounded-md mb-2 mr-4 items-center">Comments: <div class="ml-1 text-gray-400 text-ms"> 60k</div></div>
                        </div>
                        
                    </div>
                    
                   
                </div>
                @endforeach
     </div>
    @endsection 