<?php

namespace App\Domains\OrderBill\Record;

use App\Domains\DishOrder\Record\DishOrder;
use So\Query\SoRecord;

class OrderBill extends SoRecord
{
    public function dishOrder()
    {
        return $this->belongsTo(DishOrder::class, 'dish_order_id');
    }
}
