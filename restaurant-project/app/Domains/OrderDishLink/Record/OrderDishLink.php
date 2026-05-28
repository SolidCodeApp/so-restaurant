<?php

namespace App\Domains\OrderDishLink\Record;

use App\Domains\Dish\Record\Dish;
use App\Domains\DishOrder\Record\DishOrder;
use So\Query\SoRecord;

class OrderDishLink extends SoRecord
{
    public function dishOrder()
    {
        return $this->belongsTo(DishOrder::class, 'dish_order_id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }
}
