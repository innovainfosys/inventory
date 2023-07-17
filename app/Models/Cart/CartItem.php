<?php

namespace App\Models\Cart;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }


}
