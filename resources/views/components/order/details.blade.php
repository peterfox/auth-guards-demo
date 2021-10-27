<div class="bg-white overflow-hidden shadow sm:rounded-lg p-4">
    <h3 class="font-bold text-lg">Order '{{ $order->title }}' is {{ $order->status }}</h3>
    <a class="text-indigo-400" href="{{ $customerUrl }}">
        {{ $customerUrl }}
    </a>
</div>
