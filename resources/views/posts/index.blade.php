@extends('layouts.app')
<style>
    .leftArrowBox::after, .leftArrowBox::before
    {
        content:'';
        border: solid transparent;
        height: 0;
        position: absolute;
    }
    .leftArrowBox:before{
        border-width: 1rem;
        border-right-color: black;
        top: 0;
        right:99.5%;
    }
    .leftArrowBox:after{
        border-width: 0.9rem;
        border-right-color:rgb(74, 85, 104);
        top: 2.5px;
        right:99%;
    }
    (min-width: 1080px) {
    .leftArrowBox:before{
        border-width: 1rem;
        border-right-color: black;
        top: 0;
        right:98%;
    }
    .leftArrowBox:after{
        border-width: 0.9rem;
        border-right-color:rgb(74, 85, 104);
        top: 2.5px;
        right:98%;
    }
    }
</style>
@section('title')
    all posts
@endsection

@section('content')
    <div class="flex justify-center pt-6">
        <div class="w-8/12 bg-gray-800 p-6 rounded-lg">

            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                @error('body')
                <div class="mb-4 text-red-600 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-4 flex justify-center">
                    <label for="body" class="sm:sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-200
                    border-2 w-1/2  p-2 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Say something!"></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="rounded bg-blue-400 text-black-50 px-4 py-3 font-monospace w-1/8">
                        Post
                    </button>
                </div>
            </form>

            @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4 bg-gray-200 rounded-lg p-1">
                        <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="text-black-50 mt-2 mb-2 border-secondary">{{ $post->body }}</p>
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        @endcan

                        <span class="font-extralight">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

                        <div class="flex items-center">
                            @auth()
                                @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-1">
                                    @csrf
    {{--                                <button type="submit" class="text-gray-900 mr-1">Like</button>--}}
                                    <button type="submit" class="leftArrowBox  bg-blue-400 p-1 text-white relative border-black
                                     border-2 rounded-md inline-block m-4 whitespace-no-wrap">Like</button>
                                </form>
                                @else
                                <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-1">
                                    @csrf
                                    @method('DELETE')
    {{--                                <button type="submit" class="text-gray-900">Unlike</button>--}}
                                    <button type="submit" class=" m-4 leftArrowBox  bg-red-400 p-1 text-white relative border-black
                                     border-2 rounded-md inline-block whitespace-no-wrap">Unlike</button>
                                </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
                    {{ $posts->links() }}
            @else
                <p>There are no posts!</p>
            @endif
        </div>
    </div>
@endsection
