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

                <p>{!! $connection->status_text  !!}</p>

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

            {{--            <div class="h-[400px] bg-darkblue border rounded-xl p-16 flex flex-col justify-center text-white gap-4">--}}
            {{--                <h2 class="text-5xl font-bold font-libre">Welcome, {{ auth()->user()->first_name }}!</h2>--}}
            {{--                <p class="max-w-3xl">Thanks for joining TheBoardroom Africa. To be eligible for board opportunities you--}}
            {{--                    must--}}
            {{--                    complete your profile, but don’t worry, we will guide you through the whole process. Here’s your--}}
            {{--                    progress so far:</p>--}}
            {{--                <div class="flex gap-8 mt-4">--}}
            {{--                    <a href="#" class="btn btn-dawn flex items-center">View Profile</a>--}}
            {{--                    <a href="#" class="btn btn-mustard flex gap-2 items-center">--}}
            {{--                        <x-heroicon-o-sparkles class="h-6 w-6 text-white"/>--}}
            {{--                        Cover letter generator</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
</x-app-layout>
