<form wire:submit.prevent="sendMessage">
    <input wire:model.defer="body" type="text" placeholder="Type your message here...">
    <button type="submit">Send</button>
</form>
