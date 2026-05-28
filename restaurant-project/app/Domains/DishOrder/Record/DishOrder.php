<?php

namespace App\Domains\DishOrder\Record;

use App\Domains\Customer\Record\Customer;
use App\Domains\OrderBill\Record\OrderBill;
use App\Domains\OrderDishLink\Record\OrderDishLink;
use So\Query\SoRecord;

class DishOrder extends SoRecord
{
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orderBill()
    {
        return $this->hasOne(OrderBill::class, 'dish_order_id');
    }

    public function orderDishLinks()
    {
        return $this->hasMany(OrderDishLink::class, 'dish_order_id');
    }
}
