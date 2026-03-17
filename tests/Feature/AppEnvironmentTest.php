<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
   

    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAppEnv1()
    {
        $this->assertEquals('testing', App::environment());
    }

    public function testAppEnv()
    {
        $this->assertTrue(
            App::environment(['local', 'testing', 'production', 'dev'])
        );
    }

    public function testAppEnv4()
    {
        if (App::environment(['testing'])) {
            $this->assertTrue(true);
        } else {
            $this->fail('Environment bukan testing');
        }
    }

    

     
}