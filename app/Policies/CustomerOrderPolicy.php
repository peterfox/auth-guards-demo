<?php

namespace App\Policies;

use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerOrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(Order $order)
    {
        return false;
    }

    public function view(Order $customer, Order $order)
    {
        return $customer->is($order);
    }

    public function create(Order $order)
    {
        return false;
    }

    public function update(Order $customer, Order $order)
    {
        return $customer->is($order);
    }

    public function delete(Order $customer, Order $order)
    {
        return false;
    }

    public function restore(Order $customer, Order $order)
    {
        return false;
    }

    public function forceDelete(Order $customer, Order $order)
    {
        return false;
    }
}
