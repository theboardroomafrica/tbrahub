<div>
    <div class="experience">
        <div class="flex gap-6 items-center">
            <h2>{{ $title }}</h2>
            @if($this->actions)
                {{ $this->createAction }}
            @endif
        </div>
        @foreach($experiences as $experience)
            <section class="experience-details mt-6">
                <div class="flex gap-2 justify-between">
                    <h3>{{ $experience->jobTitle }} &#x2022; {{ $experience->organization }}</h3>
                    @if($this->actions)
                        <div class="flex gap-2">
                            {{ ($this->editAction)(['experience_id' => $experience->id]) }}
                            {{ ($this->deleteAction)(['experience_id' => $experience->id]) }}
                        </div>
                    @endif
                </div>
                <p class="text-tender-400 text-sm">{{ $experience->start_date->format('F Y') }} -
                    {{ $experience->end_date?->format('F Y') ?? "Present" }}
                    | {{ $experience->location }}</p>
                <div class="mt-4 prose">
                    {!! nl2br($experience->description) !!}
                </div>
                @if($this->model == "board")
                    @foreach($experience->committees as $committee)
                        @if($loop->index === 0)
                            <p class="my-4"><b>Committees</b></p>
                        @endif
                        <p>&#x2022; {{ $committee->name }} — <b>{{ $committee->role }}</b></p>
                    @endforeach
                @endif
            </section>
        @endforeach
    </div>

    <x-filament-actions::modals/>
</div>
