<x-app-layout>
    <section class="mt-8">
        <div class="container">
            <div class="rounded-xl border p-16 opportunity-details bg-white">
                <h2 class="text-5xl font-bold font-libre">Invitation to Connect</h2>

                <p class="mt-4">
                    You have been invited to connect regarding a potential board role opportunity. To proceed with
                    consideration, please confirm or decline this connection request. Review the details below, and let
                    us know your decision to explore this opportunity further.
                </p>

                <h3>Opportunity title:</h3>

                <p>{{ $connection->opportunity->name }}</p>

                <h3>Company:</h3>

                <p>{{ $connection->opportunity->company }}</p>

                <h3>Details:</h3>

                <p>{!! $connection->opportunity->info  !!}</p>

                <h3>Status:</h3>

                <p>
                    <x-badge :state="$connection->status">{{ $connection->statusText }}</x-badge>
                </p>

                @if(is_null($connection->status))

                    <div class="mt-8 flex space-x-4">
                        <form action="{{ route('connections.confirm', $connection->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Confirm Interest
                            </button>
                        </form>
                        <form action="{{ route('connections.decline', $connection->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="btn btn-danger">
                                Decline Invitation
                            </button>
                        </form>
                    </div>

                @endif
            </div>
        </div>
    </section>
</x-app-layout>
