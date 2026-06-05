@extends('layouts.app')

@section('title', 'Iniciar sesión')
@section('hide-navbar')@endsection

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md">

        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            Iniciar sesión
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}"
              class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">
                    Correo electrónico
                </label>
                <input
                    type="email" id="email" name="email"
                    value="{{ old('email') }}"
                    required autofocus
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="usuario@ejemplo.com"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600 mb-1">
                    Contraseña
                </label>
                <input
                    type="password" id="password" name="password"
                    required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••"
                >
            </div>

            <div class="flex items-center justify-between mb-5">
                <label class="flex items-center gap-2 text-sm text-gray-500 cursor-pointer">
                    <input type="checkbox" name="remember"> Recordarme
                </label>
            </div>

            <button type="submit"
                class="w-full bg-blue-700 text-white py-2.5 rounded-lg text-sm font-medium hover:bg-blue-800 transition">
                Iniciar sesión
            </button>
        </form>

    </div>
</div>
@endsection