<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation;

class ConversationMessages extends Component
{
    public $conversation;

    protected $listeners = ['messageSent' => 'reloadMessages'];

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function reloadMessages()
    {
        $this->conversation->refresh();
    }

    public function render()
    {
        return view('livewire.conversation-messages', [
            'messages' => $this->conversation->messages
        ]);
    }
}
