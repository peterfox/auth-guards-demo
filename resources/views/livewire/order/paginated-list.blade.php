<div class="space-y-4">
    @foreach($orders as $order)
        <x-order.details :order="$order"></x-order.details>
    @endforeach

    {{ $orders->links() }}
</div>
