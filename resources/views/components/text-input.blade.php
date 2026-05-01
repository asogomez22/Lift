@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-(--liftRed) focus:ring-(--liftRed) rounded-xl shadow-xs']) }}>