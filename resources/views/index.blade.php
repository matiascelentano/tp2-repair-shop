@extends('layouts.app')

@section('title', 'Reparaciones')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Reparaciones</h1>
            <a href="{{ route('repairs.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Nueva Reparación
            </a>
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Marca</th>
                        <th class="px-4 py-3">Modelo</th>
                        <th class="px-4 py-3">Fecha Ingreso</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($repairs as $repair)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $repair->id }}</td>
                        <td class="px-4 py-3">{{ $repair->nombre_cliente }}</td>
                        <td class="px-4 py-3">{{ $repair->marca_celular }}</td>
                        <td class="px-4 py-3">{{ $repair->modelo_celular }}</td>
                        <td class="px-4 py-3">{{ $repair->fecha_ingreso->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                @if($repair->estado === 'Ingresado') bg-yellow-100 text-yellow-800
                                @elseif($repair->estado === 'En reparación') bg-blue-100 text-blue-800
                                @elseif($repair->estado === 'Reparado') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $repair->estado }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('repairs.show', $repair) }}"
                               class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('repairs.edit', $repair) }}"
                               class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('repairs.destroy', $repair) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                            No hay reparaciones registradas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection