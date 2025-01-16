@php
    $isActive = request()->routeIs($route ?? '') || request()->fullUrlIs(url($href));
    $classes = $isActive 
        ? 'bg-blue-600 text-white' 
        : 'text-blue-900 hover:bg-white hover:text-black';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' rounded-md px-3 py-2 text-sm font-medium']) }}>
    {{ $slot }}
</a>
