@extends('layouts.app')

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
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="text-black-50 mt-2 mb-2">{{ $post->body }}</p>

                        <div class="flex items-center">
                            @if(!$post->likedBy(auth()->user()))
                            <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-1">
                                @csrf
                                <button type="submit" class="text-gray-900 mr-1">Like</button>
                            </form>
                            @else
                            <form action="{{ route('posts.like', $post) }}" method="POST" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-900">Unlike</button>
                            </form>
                            @endif
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
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
