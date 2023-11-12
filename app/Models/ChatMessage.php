<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
  use HasFactory;
  protected $casts = [
    'sender_id' => 'integer',
    'chat_id' => 'integer',
  ];
}
