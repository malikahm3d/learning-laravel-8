@props(['post' => $post])
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
