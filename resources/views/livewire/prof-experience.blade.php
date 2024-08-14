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
                    <h3>{{ $experience->position }} &#x2022; {{ $experience->organization }}</h3>
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
            </section>
        @endforeach
    </div>

    <x-filament-actions::modals/>
</div>
