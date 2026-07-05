@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow border">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Kategori Baru</h2>
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                    class="w-full border rounded p-2 focus:border-blue-500 @error('nama_kategori') border-red-500 @enderror">
                @error('nama_kategori')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
