@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm border">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Tambah Kategori
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-200 mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-200 px-4 py-2 text-left">Nama Kategori</th>
                    <th class="border border-gray-200 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2">{{ $category->id }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $category->nama_kategori }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center space-x-2">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus kategori ini juga akan menghapus produk di dalamnya?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
