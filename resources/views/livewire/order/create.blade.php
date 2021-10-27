<x-jet-form-section submit="makeOrder">
    <x-slot name="title">
        {{ __('Create Order') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create an order to share with a customer.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Title -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="price" value="{{ __('Price') }}" />
            <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="price" />
            <x-jet-input-error for="price" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="orderCreated">
            {{ __('Created.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
