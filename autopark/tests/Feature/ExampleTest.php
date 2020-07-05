<?php

namespace Tests\Feature;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Car;


class ExampleTest extends TestCase
{

    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }



}
