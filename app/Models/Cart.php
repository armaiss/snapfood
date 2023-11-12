<?php

namespace App\Models;

use App\Enums\StatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;
    public $guarded =['id'];
    public  $status =[
        'status'=>StatusType::class
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foods()
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
    public function comments(): HasMany
    {
        return $this->hasMany(comment::class);
    }



}
