@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-background border border-white/20 text-text-main focus:border-accent-teal focus:ring-accent-teal rounded-full px-5 py-3 shadow-inner w-full transition-all']) }}>
