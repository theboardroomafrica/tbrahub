<div
    x-data="{
        show: true,
        types: {
            success: 'bg-green-500',
            error: 'bg-red-500',
            warning: 'bg-yellow-500',
            info: 'bg-blue-500'
        }
    }"
    x-show="show"
    x-init="setTimeout(() => show = false, 5000)"
    x-transition
    class="fixed top-5 right-5 z-50"
>
    <div
        :class="types['{{ $type }}']"
        class="px-4 py-2 text-white rounded shadow-lg"
    >
        {{ $message ?? '' }}
        <button
            @click="show = false"
            class="ml-2 text-white hover:opacity-75"
        >
            &times;
        </button>
    </div>
</div>
