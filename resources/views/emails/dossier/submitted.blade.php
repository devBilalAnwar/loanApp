{{-- resources/views/emails/dossier/submitted.blade.php --}}

<h1>Nouveau Dossier Locataire Soumis</h1>

<p>Un nouveau dossier a été soumis avec les informations suivantes :</p>

<ul>
    <li>Nom du locataire: {{ $dossier->locataire }}</li>
    <li>Email: {{ $dossier->email }}</li>
    <li>Téléphone: {{ $dossier->telephone }}</li>
    <li>Commentaires: {{ $dossier->commentaires }}</li>
</ul>

<p>
    Vous pouvez examiner le dossier en vous connectant à votre espace Leaze.
</p>
