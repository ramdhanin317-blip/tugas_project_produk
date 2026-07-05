@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow border">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Tambah Produk Baru</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Kategori Produk</label>
                <select name="category_id"
                    class="w-full border rounded p-2 focus:border-blue-500 @error('category_id') border-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                    class="w-full border rounded p-2 focus:border-blue-500 @error('nama_produk') border-red-500 @enderror">
                @error('nama_produk')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga') }}"
                        class="w-full border rounded p-2 focus:border-blue-500 @error('harga') border-red-500 @enderror">
                    @error('harga')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok') }}"
                        class="w-full border rounded p-2 focus:border-blue-500 @error('stok') border-red-500 @enderror">
                    @error('stok')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Gambar Produk</label>
                <input type="file" name="gambar"
                    class="w-full border rounded p-2 bg-gray-50 focus:border-blue-500 @error('gambar') border-red-500 @enderror">
                @error('gambar')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 shadow">Simpan
                    Produk</button>
            </div>
        </form>
    </div>
@endsection
