@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-sans text-sm text-black textCustomClass']) }}>
    {{ $value ?? $slot }}
</label>
