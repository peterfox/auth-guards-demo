<?php

namespace Tests\Feature\Customer;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AuthenticateWithUrlTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the signed url authenticates the customer
     *
     * @return void
     */
    public function test_authenticates_customers_with_the_signed_url()
    {
        $order = Order::factory()->create();
        $this->get(URL::signedRoute('order.view', ['order' => $order]))
            ->assertOk()
            ->assertSee($order->title);

        $this->assertAuthenticatedAs($order, 'customer');
    }

    /**
     * Test without the signed url authenticates the customer is redirected away from the page
     *
     * @return void
     */
    public function test_redirects_on_unauthenticated_access_with_the_non_signed_url()
    {
        $order = Order::factory()->create();
        $this->get(URL::route('order.view', ['order' => $order]))
            ->assertRedirect();

        $this->assertGuest('customer');
    }

    /**
     * Test the customer must be authenticated with the correct order
     *
     * @return void
     */
    public function test_forbids_customers_from_seeing_other_orders()
    {
        $order = Order::factory()->create();
        $customer = Order::factory()->create();
        $this->actingAs($customer)
            ->get(URL::route('order.view', ['order' => $order]))
            ->assertForbidden();
    }

    /**
     * Test the customer can authenticate as a different customer using a new signed url
     *
     * @return void
     */
    public function test_reauthenticates_customers_as_different_customers()
    {
        $order = Order::factory()->create();
        $customer = Order::factory()->create();

        $this->actingAs($customer)
            ->get(URL::signedRoute('order.view', ['order' => $order]))
            ->assertOk()
            ->assertSee($order->title);

        $this->assertAuthenticatedAs($order, 'customer');
    }
}
