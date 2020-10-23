<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'wallet_id',
    ];

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet');
    }

}
