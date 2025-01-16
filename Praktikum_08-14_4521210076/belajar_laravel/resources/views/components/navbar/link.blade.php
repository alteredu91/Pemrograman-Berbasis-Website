<a {{ $attributes }} class="{{ request()->fullurlis(url($href)) ? 'bg-zinc-700 text-white' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }} rounded-md px-3 py-2 text-sm">
    {{ $slot }}
</a>
