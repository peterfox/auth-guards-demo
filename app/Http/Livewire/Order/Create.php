<?php

namespace App\Http\Livewire\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $price;

    protected $rules = [
        'title' => 'string|min:3',
        'price' => 'numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function makeOrder()
    {
        $order = Auth::user()->orders()->create($this->validate());
        Session::flash('flash.banner', 'Yay it works!');
        Session::flash('flash.bannerStyle', 'success');

        $this->emit('orderCreated', $order);
    }

    public function render()
    {
        return view('livewire.order.create');
    }
}
