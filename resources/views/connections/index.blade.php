<x-app-layout>
    <section class="mt-8">
        <div class="container">
            <div class="bg-darkblue border rounded-xl p-16 flex flex-col justify-center text-white gap-4">
                <h2 class="text-5xl font-bold font-libre">Connection Requests</h2>
            </div>
        </div>
    </section>
    <section class="mt-12">
        <div class="container">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($connections as $connection)
                    <a href="{{ route('connections.show', $connection) }}" class="flex border rounded-xl p-4 bg-white
                       items-center">
                        <img alt="{{ $connection->opportunity->company }} Logo" src="https://placehold.co/300"
                             width="80">
                        <div class="ml-3 flex-1">
                            <p class="font-bold">{{ $connection->opportunity->name }}</p>
                            <p class="text-sm">{{ $connection->opportunity->company }}</p>
                            <div class="mt-2 flex justify-between text-sm">
                                <p>{{ $connection->created_at->format('d M Y') }}</p>
                                <p>{{ $connection->statusText }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
