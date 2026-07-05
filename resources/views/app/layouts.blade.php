@auth
    <nav class="bg-blue-600 text-white p-4 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <h1 class="font-bold text-xl tracking-wide">NR Sneaks</h1>
        </div>

        <div class="flex items-center space-x-6">
            <a href="{{ route('products.index') }}" class="hover:text-gray-200 transition font-medium">Produk</a>
            <a href="{{ route('categories.index') }}" class="hover:text-gray-200 transition font-medium">Kategori</a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-sm font-semibold transition shadow-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>
@endauth
