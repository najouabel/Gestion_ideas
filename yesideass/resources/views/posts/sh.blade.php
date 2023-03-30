@extends('posts.layout')
@section('content')

<br>

  <a href="{{ route('posts.index') }}"
  class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200">all product</a>
<br>
<br>



    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Name
        </label>
        <p>{{ $product->name }}</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            details
          </label>
          <p>{{ $product->details }}</p>
        </div>
      </div>
        <img   width="300 px" src="/public/images/{{ $product->image }}">
           
    
@endsection 