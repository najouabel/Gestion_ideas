@extends('posts.layout')
@section('content')

<div class="bg-white shadow rounded-lg mt-10 "  >
    <div class="flex flex-row px-2 py-3 mx-3">
        <div class="w-auto h-auto rounded-full border-2 border-green-500">
            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="https://images.unsplash.com/photo-1533113354171-490d836238e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
        </div>
        <div class="flex flex-col mb-2 ml-4 mt-1">
            <div class="text-gray-600 text-sm font-semibold">{{$post->name}}</div>
            <div class="flex w-full mt-1">
               
                <div class="text-gray-400 font-thin text-xs">
                    • {{$post->updated_at->diffForHumans() }} 
                </div>
            </div>
        </div>
    </div>
    <div class=""></div>
    <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
        <img class="rounded w-full" src="{{ asset('images/' . $post->image) }}">
    </div>
    <div class="text-gray-500 text-sm mb-6 mx-3 px-2">{{$post->details}}</div>
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
    
</div>
   
    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
        <h2 class="text-xl font-semibold mb-4">Commentaires</h2>
        @foreach($post->comments as $item)
          <div class="flex items-start mb-4">
            <img src="https://images.unsplash.com/photo-1533113354171-490d836238e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Photo de profil de {{$post->user->name}}" class="w-10 h-10 rounded-full mr-2">
            <div class="flex-1">
              <div class="flex justify-between items-center mb-2">
                <h3 class="font-semibold">{{$item->user->name}}</h3>
                <span class="text-gray-400 text-sm">{{ $item->created_at->diffForHumans() }}</span>
              </div>
              <p class="text-gray-600">{{ $item->body }}</p>
              <form action="{{ route('commentaire.l.store',$item)}}" method="POST">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $item->id }}">
                @if ($item->likedBy(auth()->user()))
                    @method('DELETE')
                @endif
                <button type="submit" class="btn btn-primary">
                    {{ $item->likedBy(auth()->user()) ? 'Je n\'aime plus' : 'J\'aime' }}
                </button>
            </form>
            </div>
          </div>
        @endforeach
      </div>
    @endsection 