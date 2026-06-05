@props(['status'])
@php
    $map = [
    'Ingresado' => 'bg-yellow-100 text-yellow-800 border border-yellow-200',
    'En reparación' => 'bg-blue-100 text-blue-800 border border-blue-200',
    'Reparado' => 'bg-green-100 text-green-800 border border-green-200',
    'Entregado' => 'bg-gray-50 text-gray-700 border border-gray-100',
    ];
    $classes = $map[$status] ?? 'bg-gray-50 text-gray-600 border border-gray-100';
@endphp

<span class="px-2 py-1 rounded-full text-xs font-semibold {{ $classes }}">{{ $status }}</span>