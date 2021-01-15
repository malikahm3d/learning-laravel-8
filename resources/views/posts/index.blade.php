@extends('layouts.app')

@section('title')
    all posts
@endsection

@section('content')
    <div class="flex justify-center pt-6">
        <div class="w-8/12 bg-blue-300 p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">
                @csrf
                @error('body')
                <div class="mb-4 text-red-600 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-4 flex justify-center">
                    <label for="body" class="sm:sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-blue-50
                    border-2 w-1/2  p-2 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Say something!"></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="rounded bg-blue-400 text-black-50 px-4 py-3 font-monospace w-1/8">
                        Post
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
