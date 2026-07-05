<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    @auth
        <nav class="bg-blue-600 text-white p-4 flex justify-between items-center shadow-md">
            <div class="flex space-x-6 items-center">
                <h1 class="font-bold text-xl tracking-wide">Laravel Project</h1>
                <a href="{{ route('products.index') }}" class="hover:underline">Produk</a>
                <a href="{{ route('categories.index') }}" class="hover:underline">Kategori</a>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-sm font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    @endauth

    <div class="container mx-auto mt-8 px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
