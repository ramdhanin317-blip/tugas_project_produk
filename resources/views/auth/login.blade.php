@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-[70vh]">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md border border-gray-200">

            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="NR Sneaks" class="w-16 h-16 object-contain mb-2">

                <h2 class="text-2xl font-bold text-gray-800 tracking-wide">NR Sneaks</h2>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
