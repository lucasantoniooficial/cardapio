<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','cell'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class,'owner');
    }

}
