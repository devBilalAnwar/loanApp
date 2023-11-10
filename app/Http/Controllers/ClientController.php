<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ClientController extends Controller
{
  public function cahierDesCharges()
  {
    return view('client.cahier_des_charges');
  }

  public function dashboardClient()
  {
    return view('client.dashboardClient');
  }

  public function propositionsLogement()
  {
    return view('client.propositionslogement');
  }

  public function visites()
  {
    return view('client.visites');
  }

  public function chatClient()
  {
    $chats = Chat::where('initiator_id', auth()->id())->orWhere('partner_id', auth()->id())->get();
    return view('client.chatclient', compact('chats'));
  }

  public function loadChatPage()
  {
    return view('client.ssr.ChatPage');
  }
  public function contratClient()
  {
    return view('client.contratClient');
  }

  public function depotDossier()
  {
    return view('client.depotdossier');
  }
}
