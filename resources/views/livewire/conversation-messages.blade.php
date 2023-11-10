<div>
    @foreach ($messages as $message)
        <div>{{ $message->body }}</div>
        <!-- Plus de détails sur le message ici -->
    @endforeach
</div>

