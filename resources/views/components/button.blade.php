@props([
    'bg' => 'red',
    'type' => 'submit',
])

@php
    $baseClasses = 'text-white flex justify-center items-center focus:ring-2 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center';
    // $bgClasses = "bg-{$bg}-600 hover:bg-{$bg}-700 focus:ring-{$bg}-300 dark:bg-{$bg}-600 dark:hover:bg-{$bg}-700 dark:focus:ring-{$bg}-800";
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses "]) }}>
    {{ $slot }}
</button>