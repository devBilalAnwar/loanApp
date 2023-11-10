<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation;

class ConversationsList extends Component
{
    public $conversations;

    public function mount()
    {
        $this->conversations = auth()->user()->conversations;
    }

    public function render()
    {
        return view('livewire.conversation-list');
    }
}
