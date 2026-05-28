<?php

namespace App\Domains\Customer\Record;

use App\Domains\DishOrder\Record\DishOrder;
use So\Query\SoRecord;

class Customer extends SoRecord
{
    public function dishOrders()
    {
        return $this->hasMany(DishOrder::class, 'customer_id');
    }
}
