<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_can_have_a_product()
    {
        $user = factory('App\User')->create();

        $user->product()->create([
            'name' => 'Thinkpad',
            'description' => 'Algun texto aqui...'
        ]);

        $this->assertEquals('Thinkpad', $user->product->name);
    }
}
