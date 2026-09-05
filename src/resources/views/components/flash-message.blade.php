@props(['status' => 'info'])

@php
    if (session('status') === 'info') {
        $bgColor = 'bg-blue-300';
    }
    if (session('status') === 'alert') {
        $bgColor = 'bg-red-400';
    }
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} w-1/2 mx-auto p-2 text-white my-4 rounded-sm">
        {{ session('message') }}
    </div>
@endif
