<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $guarded =['id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function food()
    {
        return $this->belongsToMany(Food::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function cartfoods()
    {
        return $this->hasMany(CartFood::class);
    }


}
