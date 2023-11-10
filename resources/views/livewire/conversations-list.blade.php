<div>
    @foreach ($conversations as $conversation)
        <div>{{ $conversation->title }}</div>
        <!-- Vous pouvez ajouter plus de détails ici -->
    @endforeach
</div>
