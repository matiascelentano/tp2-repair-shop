@extends('layouts.app')

@section('title', 'Editar Reparación')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Reparación #{{ $repair->id }}</h1>
            <a href="{{ route('repairs.index') }}" class="text-blue-600 hover:underline">← Volver</a>
        </div>

        <div class="space-y-3 text-sm text-gray-700">
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Cliente</span>
                <span>{{ $repair->nombre_cliente }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Marca</span>
                <span>{{ $repair->marca_celular }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Modelo</span>
                <span>{{ $repair->modelo_celular }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Fecha de ingreso</span>
                <span>{{ $repair->fecha_ingreso->format('d/m/Y') }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium">Estado</span>
                <span>{{ $repair->estado }}</span>
            </div>
            <div class="border-b pb-2">
                <span class="font-medium">Descripción de la falla</span>
                <p class="mt-1">{{ $repair->descripcion_falla }}</p>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('repairs.edit', $repair) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Editar
            </a>
            <form action="{{ route('repairs.destroy', $repair) }}" method="POST"
                  onsubmit="return confirm('¿Eliminar esta reparación?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection