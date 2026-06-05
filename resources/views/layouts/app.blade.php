<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Reparaciones')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-blue-700 text-white px-8 py-4 flex justify-between items-center shadow">
        <a href="{{ route('repairs.index') }}" class="text-xl font-bold tracking-wide">
            🔧 RepairShop
        </a>
        <div class="flex gap-4 text-sm">
            <a href="{{ route('repairs.index') }}" class="hover:underline">Reparaciones</a>
            <a href="{{ route('repairs.create') }}" class="hover:underline">+ Nueva</a>
        </div>
    </nav>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto mt-4 px-4">
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded border border-green-300">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- Contenido principal --}}
    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center text-gray-400 text-xs py-6">
        RepairShop © {{ date('Y') }}
    </footer>

</body>
</html>