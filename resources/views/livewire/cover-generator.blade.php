<div>

    <div class="flex items-center justify-between my-2">
        <label for="cvgenerator" class="block text-sm font-medium text-gray-900">Cover
            Letter</label>
        <button wire:click="getResponse" class="flex btn btn-white gap-2 items-center">
            <x-heroicon-o-sparkles class="h-6 w-6"/>
            Generate cover letter
        </button>
    </div>
    <textarea wire:stream="stream" id="cvgenerator" rows="16"
              class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
              placeholder="Write your cover letter here or use the AI generator...">{{ $response }}</textarea>

</div>
