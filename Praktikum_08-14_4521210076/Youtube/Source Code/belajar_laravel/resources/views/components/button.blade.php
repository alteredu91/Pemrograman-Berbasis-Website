@props([
    'type' => 'submit',
    'as' => 'button'
    ])

@php
$classes = "block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
@endphp

@if ($as == 'button')
<button type="{{$type}}" {{$attributes->merge(['class' => $classes])}}>
    {{$slot}}
</button>
@else
<a {{$attributes->merge(['class' => $classes])}}>
    {{$slot}}
</a>
@endif
