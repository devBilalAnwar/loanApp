<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Message;
use App\Models\User;
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
  public function send_message(Request $request)
  {
    $chat_id = $request->chat_id;
    $sender_id = auth()->id();
    $chat = Chat::find($chat_id);
    if ($chat->initiator_id == $sender_id || $chat->partner_id == $sender_id) {
      $message = new ChatMessage();
      $message->message = $request->message;
      $message->sender_id = $sender_id;
      $message->chat_id = $chat_id;
      $message->save();
      return "message sent successfully";
    }
  }

  public function loadChatPage(Request $request)
  {
    $chat_id = $request->chat_id;
    $login_id = auth()->id();
    $chat = Chat::find($chat_id);
    if ($chat->initiator_id == $login_id || $chat->partner_id == $login_id) {
      $partner = $chat->partner;
      $initiator = $chat->initiator;
      $messages = ChatMessage::where('chat_id', $chat_id)->oldest()->get();
      return view('client.ssr.ChatPage', compact('messages', 'initiator', 'partner', 'chat'));
    }
  }
  public function contratClient()
  {
    return view('client.contratClient');
  }

  public function depotDossier()
  {
    return view('client.depotdossier');
  }
  public function assignChat()
  {
    $chats = Chat::get();
    return view('admin.chat.assignChat', compact('chats'));
  }
  public function add_new_chat()
  {
    $users = User::get();
    return view('admin.chat.add_chat', compact('users'));
  }
  public function save_chat(Request $request)
  {
    $initiator_id = $request->initiator_id;
    $partner_id = $request->partner_id;
    $chat = Chat::where('partner_id', $partner_id)->where('initiator_id', $initiator_id)->first();
    if ($chat) {
      return redirect()->route('assignChat');
    }
    $chat = Chat::where('partner_id', $initiator_id)->where('initiator_id', $partner_id)->first();
    if ($chat) {
      return redirect()->route('assignChat');
    }
    $chat = new Chat();
    $chat->initiator_id = $initiator_id;
    $chat->partner_id = $partner_id;
    $chat->save();
    return redirect()->route('assignChat');
  }
}
