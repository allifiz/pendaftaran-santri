@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-semibold leading-5 text-emerald-900 shadow-sm focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center rounded-full border border-transparent px-4 py-2 text-sm font-medium leading-5 text-slate-600 transition duration-150 ease-in-out hover:border-emerald-100 hover:bg-emerald-50 hover:text-emerald-900 focus:outline-none focus:border-emerald-200 focus:bg-emerald-50 focus:text-emerald-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
