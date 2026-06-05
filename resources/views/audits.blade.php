@extends('layouts.app')

@section('title', 'Historial de cambios')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Cambios — Reparación #{{ $repair->id }}</h1>
        <a href="{{ route('repairs.index') }}" class="text-sm text-gray-600 hover:underline">Volver</a>
    </div>

    @if($audits->isEmpty())
        <div class="bg-white p-4 rounded shadow">No hay cambios registrados.</div>
    @else
        <div class="space-y-4">
            @foreach($audits as $audit)
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-xs text-gray-500 mb-2">
                        {{ $audit->created_at->format('d/m/Y H:i') }}
                        — {{ $audit->user?->name ?? 'Sistema' }}
                    </div>

                    <div class="text-sm">
                        @foreach($audit->changes as $field => $value)
                            <div class="flex gap-2">
                                <span class="font-semibold">{{ $field }}:</span>
                                <span>{{ is_array($value) ? json_encode($value) : $value }}</span>
                            </div>
                        @endforeach
                    </div>

                    @if(!empty($audit->notes))
                        <div class="mt-2 text-sm text-gray-600">Notas: {{ $audit->notes }}</div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection