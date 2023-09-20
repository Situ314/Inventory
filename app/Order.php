<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['customer_id','order_date'];

    protected $hidden = ['created_at','updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_orders')
            ->withPivot('qty');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
