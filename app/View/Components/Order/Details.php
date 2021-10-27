<?php

namespace App\View\Components\Order;

use App\Models\Order;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;

class Details extends Component
{
    /**
     * @var Order
     */
    private $order;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function customerUrl()
    {
        return URL::signedRoute('order.view', ['order' => $this->order]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order.details', ['order' => $this->order]);
    }
}
