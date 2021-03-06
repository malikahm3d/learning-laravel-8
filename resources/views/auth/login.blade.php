@extends('layouts.app')

@section('content')
    <div class="flex justify-center pt-6">
        <div class="w-6/12 bg-blue-300 p-6 rounded-lg">

            @if(session()->has('status'))
                <div class="text-red-50">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email">email</label>
                    <input type="text" name="enteredemail" id="email" placeholder="Enter your email"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg" @error('email') is-invalid @enderror value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg" @error('password') is-invalid @enderror value="">
                    @error('password')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="remember_me">Remember me</label>
                        <input type="checkbox" name="remember_me" id="remember_me" class="ml-2">
                    </div>
                </div>
                <div>
                    <button type="submit" class="rounded bg-blue-400 text-black-50 px-4 py-3 font-monospace w-1/8">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
