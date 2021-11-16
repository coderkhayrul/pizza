<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $guards = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
