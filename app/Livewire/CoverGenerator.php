<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class CoverGenerator extends Component
{
    public ?string $response = null;
    public string $initialPlaceholder = "Write your cover letter here or use the AI generator...";
    public string $placeholder = "Write your cover letter here or use the AI generator...";

    public function getResponse()
    {
        $this->response = '';

        $this->placeholder = "Generating cover letter...";

        $stream = OpenAI::threads()->createAndRunStreamed([
            'assistant_id' => 'asst_METMOpNm0R2mRDGgWn4MQOCI',
            'model' => 'gpt-4o-mini',
            'thread' => [
                'messages' =>
                    [
                        [
                            'role' => 'user',
                            'content' => memberCv(),
                        ],
                    ],
            ],
        ]);

        foreach ($stream as $response) {
            $content = '';
            if ($response->event == 'thread.message.delta') {
                $content = $response->response['delta']['content'][0]['text']['value'];
                $this->response .= $content;
            }

            $this->stream('stream', $content);
        }

        $this->placeholder = "Write your cover letter here or use the AI generator...";
    }

    public function render()
    {
        return view('livewire.cover-generator');
    }
}
