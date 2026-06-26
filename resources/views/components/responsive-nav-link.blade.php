@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-start text-base font-semibold text-emerald-900 shadow-sm focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full rounded-2xl border border-transparent px-4 py-3 text-start text-base font-medium text-slate-600 hover:border-emerald-100 hover:bg-emerald-50 hover:text-emerald-900 focus:outline-none focus:border-emerald-200 focus:bg-emerald-50 focus:text-emerald-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
