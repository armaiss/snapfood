<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartFood extends Model
{
    use HasFactory;
    protected $guarded =['id'];
//public $table = 'carts';
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
