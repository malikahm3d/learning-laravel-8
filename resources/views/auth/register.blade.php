@extends('layouts.app')

@section('content')
    <div class="flex justify-center pt-6">
        <div class="w-6/12 bg-blue-300 p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" @error('name') is-invalid @enderror value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your Username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" @error('username') is-invalid @enderror value="{{ old('username') }}">
                    @error('username')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email"
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
                    <label for="password_confirmation">password conformation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>
                <div>
                    <button type="submit" class="rounded bg-blue-400 text-black-50 px-4 py-3 font-monospace w-1/8">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
