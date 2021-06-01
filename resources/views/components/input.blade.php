@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-blue-300 focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50']) !!}>
