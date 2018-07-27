<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A auth test for the creation of a new Post
     */
    public function testAuthTest()
    {
        $response = $this->post('posts', array());
        $response->assertStatus(401);
    }
}
