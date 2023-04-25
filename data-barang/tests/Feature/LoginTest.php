<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_authenticate(){

        $respone = $this->post('login');

        $response->assertStatus(200);
    }
}
