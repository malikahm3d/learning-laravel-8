@extends('layouts.app')

@section('content')
    <div class="flex justify-center pt-6">
        <div class="w-8/12 bg-blue-300 p-6 rounded-lg">
            @foreach($posts as $post)
                <p>{{ $post->body }}</p>
            @endforeach
        </div>
    </div>
@endsection
