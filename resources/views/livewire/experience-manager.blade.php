<div>
    <div class="flex gap-6 items-center">
        <h2>{{ $this->title }}</h2>
        @if($this->actions)
            {{ $this->createAction }}
        @endif
    </div>
    @if(in_array($this->model, ["board", "professional"]))
        @foreach($records as $record)
            <section class="experience-details mt-6">
                <div class="flex gap-2 justify-between">
                    <h3>{{ $record->jobTitle }} &#x2022; {{ $record->organization }}</h3>
                    @include('livewire.partials.profile-actions')
                </div>
                <p class="text-tender-400 text-sm">{{ $record->start_date->format('F Y') }} -
                    {{ $record->end_date?->format('F Y') ?? "Present" }}
                    | {{ $record->location }}</p>
                <div class="mt-4 prose">
                    {!! nl2br($record->description) !!}
                </div>
                @if($this->model == "board")
                    @foreach($record->committees as $committee)
                        @if($loop->index === 0)
                            <p class="my-4"><b>Committees</b></p>
                        @endif
                        <p>&#x2022; {{ $committee->name }} — <b>{{ $committee->role }}</b></p>
                    @endforeach
                @endif
            </section>
        @endforeach
    @endif

    @if($this->model == "achievement")
        @foreach($records as $record)
            <div class="mt-4">
                <div class="flex gap-2 justify-between">
                    <h3>{{ $record->title }}</h3>
                    @include('livewire.partials.profile-actions')
                </div>
                <p class="mt-2">{{ $record->description }}</p>
            </div>
        @endforeach
    @endif

    @if($this->model == "language")
        <div class="mt-4">
            <ul class="mt-4 list-disc">
                @foreach($records as $record)
                    <li>
                        <div class="flex gap-2 justify-between mb-2">
                            <p><b>{{ $record->language->name }}</b>
                                ({{ $record->spokenProficiency->name }})</p>
                            @include('livewire.partials.profile-actions')
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($this->model == "recognition")
        <div class="mt-4">
            <ul class="mt-4 list-disc">
                @foreach($records as $record)
                    <li>
                        <div class="flex gap-2 justify-between mb-2">
                            <p><b>{{ $record->award }}</b>, {{ $record->organization }}
                                , {{ $record->year }}</p>
                            @include('livewire.partials.profile-actions')
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($this->model == "board_skill")
        <div class="mt-4">
            <ul class="mt-4 list-disc">
                @foreach($records as $record)
                    <li>
                        <div class="flex gap-2 justify-between mb-2">
                            <p><b>{{ $record->skill->name }}</b></p>
                            @include('livewire.partials.profile-actions')
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-filament-actions::modals/>
</div>
