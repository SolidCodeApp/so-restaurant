<?php

namespace App\Domains\Dish\Record;

use App\Domains\OrderDishLink\Record\OrderDishLink;
use So\Query\SoRecord;

class Dish extends SoRecord
{
    public function orderDishLinks()
    {
        return $this->hasMany(OrderDishLink::class, 'dish_id');
    }
}
