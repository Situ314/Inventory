<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','price','image','qty'];

    protected $hidden = ['created_at','updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'products_orders')
            ->withPivot('qty');
    }
}
