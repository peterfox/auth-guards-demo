<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-4">
                <h1 class="text-2xl">Your Order is {{ $order->title }}, status is {{ $order->status }}</h1>
                <h2 class="text-lg">£{{ $order->price }}.00</h2>
                <form action="{{ route('order.cancel', ['order' => $order]) }}" method="post">
                    @csrf
                    <x-jet-button>
                        Cancel
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
