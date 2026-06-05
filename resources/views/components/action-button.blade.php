@props(['color' => 'indigo', 'variant' => 'solid'])
@php
    $palette = [
    'indigo'=>['solid'=>'bg-indigo-600 text-white hover:bg-indigo-700','outline'=>'bg-white text-indigo-600 border border-indigo-200 hover:bg-indigo-50'],
    'red'=>['solid'=>'bg-red-600 text-white hover:bg-red-700','outline'=>'bg-white text-red-600 border border-red-200 hover:bg-red-50'],
    'yellow'=>['solid'=>'bg-yellow-400 text-black hover:bg-yellow-500','outline'=>'bg-white text-yellow-800 border border-yellow-200 hover:bg-yellow-50'],
    'green'=>['solid'=>'bg-green-600 text-white hover:bg-green-700','outline'=>'bg-white text-green-600 border border-green-200 hover:bg-green-50'],
    'white'=>['solid'=>'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50','outline'=>'bg-transparent text-gray-700'],
    ];
    $base = 'inline-flex items-center px-3 py-1 text-sm font-medium rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2';
    $classes = $palette[$color][$variant] ?? $palette['indigo']['solid'];
@endphp

<button {{ $attributes->merge(['class' => $base.' '.$classes]) }}>
  {{ $slot }}
</button>