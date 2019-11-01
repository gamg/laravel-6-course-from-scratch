<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_create_a_product()
    {
        //$this->withoutExceptionHandling();

        $user = factory('App\User')->create();

        $this->actingAs($user);

        $this->post('/product', [
            'name' => 'Xiaomi',
            'description' => 'Alguna descripcion.....'
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Xiaomi']);
    }

    public function test_guest_cannot_create_a_product()
    {
        // $this->withoutExceptionHandling();
        $this->post('/product')->assertRedirect('/login');
    }
}
