<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  use HasFactory;
  protected $casts = [
    'initiator_id' => 'integer',
    'partner_id' => 'integer',
  ];

  // who initiated the chat
  public function initiator()
  {
    return $this->belongsTo(User::class, 'initiator_id');
  }

  // Chat Partner
  public function partner()
  {
    return $this->belongsTo(User::class, 'partner_id');
  }
}
