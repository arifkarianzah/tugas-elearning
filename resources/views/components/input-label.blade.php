@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-text-muted mb-2']) }}>
    {{ $value ?? $slot }}
</label>
