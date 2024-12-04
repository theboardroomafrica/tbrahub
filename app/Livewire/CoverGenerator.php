<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class CoverGenerator extends Component
{
    public ?string $response = null;

    public function getResponse()
    {
        $stream = OpenAI::threads()->createAndRunStreamed([
            'assistant_id' => 'asst_FJ8ymye160lifo7BXayuGDJC',
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
    }

    public function render()
    {
        return view('livewire.cover-generator');
    }
}
