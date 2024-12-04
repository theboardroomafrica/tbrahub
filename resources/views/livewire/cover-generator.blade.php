<div>
    <button wire:click="getResponse">Generate CV</button>

    <label for="cvgenerator" class="block mb-2 text-sm font-medium text-gray-900 mt-8">Cover Letter</label>
    <textarea wire:stream="stream" id="cvgenerator" rows="16"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
              placeholder="Write your thoughts here...">{{ $response }}</textarea>

</div>
