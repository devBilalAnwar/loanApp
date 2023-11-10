<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Conversation;

class SendMessageForm extends Component
{
    public $body;
    public $conversation;

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function sendMessage()
    {
        $this->validate([
            'body' => 'required|string'
        ]);

        Message::create([
            'body' => $this->body,
            'conversation_id' => $this->conversation->id,
            'user_id' => auth()->id(),
        ]);

        $this->body = '';

        $this->emit('messageSent');
    }

    public function render()
    {
        return view('livewire.send-message-form');
    }
}
