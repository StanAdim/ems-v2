<?php

namespace App\Livewire;

use App\Models\EventConversation;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class PostConversation extends Component implements HasForms
{
    use InteractsWithForms;

    public $placeholder = '';
    public $eventId;
    public $parentConversationId = null;

    #[Locked]
    public $ignoreReplyTo = false;


    public function render()
    {
        return view('livewire.post-conversation');
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('message')
                    ->label('')
                    ->placeholder($this->placeholder)
                    ->required()
                    ->toolbarButtons([
                        // 'attachFiles',
                        // 'blockquote',
                        'bold',
                        // 'bulletList',
                        // 'codeBlock',
                        // 'h2',
                        // 'h3',
                        'italic',
                        'link',
                        // 'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ]),
            ])
            ->statePath('data')
            ->model(EventConversation::class);
    }

    public function create(): void
    {
        $conversation = EventConversation::create(
            [
                'event_model_id' => $this->eventId,
                'user_id' => auth()->user()->id,
                'parent_conversation_id' => $this->parentConversationId,
            ]
            + $this->form->getState()
        );

        $this->form->fill();
        $this->dispatch(
            'conversation-created',
            ['id' => $conversation->id]
        );
    }

    #[On('reply-to')]
    public function replyTo($id)
    {
        if ($this->ignoreReplyTo)
            return;

        $this->parentConversationId = $id;
    }
}
