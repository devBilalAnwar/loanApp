<ul class="list-unstyled">
    @foreach ($contacts as $contact)
        <li>{{ $contact->name }}</li>
        <!-- Plus de détails sur le contact ici -->
    @endforeach
</ul>
