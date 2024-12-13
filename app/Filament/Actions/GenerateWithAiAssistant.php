<?php

namespace App\Filament\Actions;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Get;
use Filament\Forms\Set;
use OpenAI\Laravel\Facades\OpenAI;

class GenerateWithAiAssistant extends Action
{
    protected string $target = '';
    protected string $assistantId = '';
    protected string $content = '';
    protected string $aiModel = 'gpt-4o-mini';

    public static function make(?string $name = null): static
    {
        $action = parent::make($name ?? 'generate')
            ->label('Generate')
            ->icon('heroicon-o-sparkles')
            ->action(function (Get $get, Set $set) use (&$action) {
                $response = '';

                $stream = OpenAI::threads()->createAndRunStreamed([
                    'assistant_id' => $action->assistantId,
                    'model' => $action->aiModel,
                    'thread' => [
                        'messages' => [
                            [
                                'role' => 'user',
                                'content' => $action->content,
                            ],
                        ],
                    ],
                ]);

                foreach ($stream as $streamResponse) {
                    $content = '';
                    if ($streamResponse->event == 'thread.message.delta') {
                        $content = $streamResponse->response['delta']['content'][0]['text']['value'];
                        $response .= $content;
                        $set($action->target, $response);
                    }
                }
            });

        return $action;
    }

    public function target(string $target): static
    {
        $this->target = $target;
        return $this;
    }

    public function assistantId(string $assistantId): static
    {
        $this->assistantId = $assistantId;
        return $this;
    }

    public function content(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function aiModel(string $aiModel): static
    {
        $this->aiModel = $aiModel;
        return $this;
    }
}
