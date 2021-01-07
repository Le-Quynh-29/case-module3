<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'orderDate','requiredDate','shippedDate','status','customerNumber'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber');
    }

    public function Orderdetail()
    {
        return $this->hasMany(Orderdetail::class,'orderNumber');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
