<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
