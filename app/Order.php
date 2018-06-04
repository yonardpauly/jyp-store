<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'sales_transaction_id',
        'user_id',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
