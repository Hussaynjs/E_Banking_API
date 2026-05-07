<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reciepient(){
        return $this->belongsTo(User::class, 'reciepient_id');
    }

    public function senderAccount(){
        return $this->belongsTo(Account::class, 'sender_account_id');
    }

    public function reciepientAccount(){
        return $this->belongsToMany(Account::class, 'reciepient_account_id');
    }
}
