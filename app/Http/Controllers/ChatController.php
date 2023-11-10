<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
  public function index()
  {
      // Récupérer les conversations de l'utilisateur
  }

  public function show(Conversation $conversation)
  {
      // Afficher une conversation spécifique
  }

  public function store(Request $request)
  {
      // Créer une nouvelle conversation
  }

  public function storeMessage(Request $request, Conversation $conversation)
  {
      // Enregistrer un nouveau message dans une conversation
  }

}
