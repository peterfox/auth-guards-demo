<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PaginatedList extends Component
{
    use WithPagination;

    protected $listeners = ['orderCreated' => '$refresh'];

    public function render()
    {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.order.paginated-list', ['orders' => $orders]);
    }
}
