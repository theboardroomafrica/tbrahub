@unless(empty($title))
    <div class="container">
        <div class="flex items-center justify-between py-6">
            <h2 class="text-3xl font-semibold text-dark font-libre">{{ $title }}</h2>

            @unless(!empty($hideButton))
                <div class="flex">
                    <a href="#" class="btn btn-white flex gap-2 items-center">
                        <x-heroicon-o-sparkles class="h-6 w-6"/>
                        Create a cover letter</a>
                </div>
            @endunless
        </div>
    </div>
@endunless
