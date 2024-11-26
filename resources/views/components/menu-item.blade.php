<li>
    <a
        href="{{ $route }}"
        class="flex items-center p-2 rounded-lg transition duration-75 hover:bg-gray-100 group"
    >
        <x-dynamic-component :component="'heroicon-o-' . $icon" class="h-6 w-6"/>
        <span class="ml-3">{{ $title }}</span>
    </a>
</li>
