<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Autopark;

class AutoparkTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreateAutopark() {
       parent::setUp();
       $autopark = $this->autopark = factory(Autopark::class)->create();
       $this->assertNotEmpty($autopark);
    }
}
