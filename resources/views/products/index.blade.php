@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm border">
        <div class="flex flex-col md:flex-row justify-between items-md-center gap-4 mb-6">
            <h2 class="text-xl font-bold text-gray-800">Manajemen Produk</h2>

            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..."
                    class="border rounded px-3 py-1.5 w-64 focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-gray-700 text-white px-4 py-1.5 rounded hover:bg-gray-800">Cari</button>
            </form>

            <a href="{{ route('products.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 self-start md:self-auto shadow-sm">
                + Tambah Produk
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border border-gray-200 px-4 py-2">Gambar</th>
                    <th class="border border-gray-200 px-4 py-2">Nama Produk</th>
                    <th class="border border-gray-200 px-4 py-2">Kategori</th>
                    <th class="border border-gray-200 px-4 py-2">Harga</th>
                    <th class="border border-gray-200 px-4 py-2">Stok</th>
                    <th class="border border-gray-200 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2 w-24">
                            @if ($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar"
                                    class="w-20 h-20 object-cover rounded shadow-sm">
                            @else
                                <span class="text-gray-400 text-sm">No Image</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-4 py-2 font-medium">{{ $product->nama_produk }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-gray-600">{{ $product->category->nama_kategori }}
                        </td>
                        <td class="border border-gray-200 px-4 py-2">Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->stok }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Data produk tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
