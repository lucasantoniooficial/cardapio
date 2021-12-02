<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','type_payment_id','date','delivery','description'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
