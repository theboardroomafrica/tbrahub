<x-dash-layout>

    @section('title', "Connection Requests")

    <section>
        <div class="container">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($connections as $connection)
                    <a href="{{ route('connections.show', $connection) }}" class="flex border rounded-xl p-4 bg-white
                       items-center">
                        <img alt="{{ $connection->opportunity->company }} Logo" src="https://placehold.co/300"
                             width="80">
                        <div class="ml-3 flex-1">
                            <p class="font-bold text-md">{{ $connection->opportunity->name }}</p>
                            <p>{{ $connection->opportunity->company }}</p>
                            <div class="mt-2 flex justify-between">
                                <p>{{ $connection->created_at->format('d M Y') }}</p>
                                <x-badge :state="$connection->status">{{ $connection->statusText }}</x-badge>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-dash-layout>
