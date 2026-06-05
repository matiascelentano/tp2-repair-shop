@extends('layouts.app')

@section('title', 'Editar Reparación')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Reparación #{{ $repair->id }}</h1>

        <form action="{{ route('repairs.update', $repair) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre del cliente</label>
                <input type="text" name="nombre_cliente"
                       value="{{ old('nombre_cliente', $repair->nombre_cliente) }}"
                       class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nombre_cliente') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Marca del celular</label>
                <input type="text" name="marca_celular"
                       value="{{ old('marca_celular', $repair->marca_celular) }}"
                       class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('marca_celular') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Modelo del celular</label>
                <input type="text" name="modelo_celular"
                       value="{{ old('modelo_celular', $repair->modelo_celular) }}"
                       class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('modelo_celular') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción de la falla</label>
                <textarea name="descripcion_falla" rows="3"
                          class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('descripcion_falla', $repair->descripcion_falla) }}</textarea>
                @error('descripcion_falla') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso"
                       value="{{ old('fecha_ingreso', $repair->fecha_ingreso->format('Y-m-d')) }}"
                       class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('fecha_ingreso') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado"
                        class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($estados as $estado)
                        <option value="{{ $estado }}"
                            {{ old('estado', $repair->estado) === $estado ? 'selected' : '' }}>
                            {{ $estado }}
                        </option>
                    @endforeach
                </select>
                @error('estado') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                    Actualizar
                </button>
                <a href="{{ route('repairs.index') }}"
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection