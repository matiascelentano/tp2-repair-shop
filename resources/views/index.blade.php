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

        <div class="bg-white rounded shadow">
    <!-- Tabla para desktop -->
        <div class="overflow-x-auto hidden md:block">
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
                            <x-status-badge :status="$repair->estado" />
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('repairs.show', $repair) }}">
                                    <x-action-button color="white" class="border-gray-200">Ver</x-action-button>
                                </a>

                                <a href="{{ route('repairs.edit', $repair) }}">
                                    <x-action-button color="yellow" variant="outline">Editar</x-action-button>
                                </a>

                                <a href="{{ route('repairs.audits', $repair) }}">
                                    <x-action-button color="indigo">Historial</x-action-button>
                                </a>

                                <form action="{{ route('repairs.destroy', $repair) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                @csrf
                                @method('DELETE')
                                <x-action-button color="red" type="submit">Eliminar</x-action-button>
                                </form>
                            </div>
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

    <!-- Tarjetas para móvil -->
        <div class="md:hidden p-4 space-y-4">
            @forelse($repairs as $repair)
                <div class="bg-white border rounded-lg p-4 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="min-w-0">
                            <div class="text-xs text-gray-500 mb-1">#{{ $repair->id }} · {{ $repair->fecha_ingreso->format('d/m/Y') }}</div>
                            <h3 class="text-md font-semibold text-gray-800 truncate">{{ $repair->nombre_cliente }}</h3>
                            <div class="text-sm text-gray-600">{{ $repair->marca_celular }} — {{ $repair->modelo_celular }}</div>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                @if($repair->estado === 'Ingresado') bg-yellow-100 text-yellow-800
                                @elseif($repair->estado === 'En reparación') bg-blue-100 text-blue-800
                                @elseif($repair->estado === 'Reparado') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $repair->estado }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-3 flex flex-wrap gap-3 text-sm">
                                <a href="{{ route('repairs.show', $repair) }}">
                                    <x-action-button color="white" class="border-gray-200">Ver</x-action-button>
                                </a>

                                <a href="{{ route('repairs.edit', $repair) }}">
                                    <x-action-button color="yellow" variant="outline">Editar</x-action-button>
                                </a>

                                <a href="{{ route('repairs.audits', $repair) }}">
                                    <x-action-button color="indigo">Historial</x-action-button>
                                </a>

                                <form action="{{ route('repairs.destroy', $repair) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                @csrf
                                @method('DELETE')
                                <x-action-button color="red" type="submit">Eliminar</x-action-button>
                                </form>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">No hay reparaciones registradas.</div>
            @endforelse
            </div>
        </div>
    </div>
@endsection