<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;
use App\Car;
use App\User;



class CarTest extends TestCase {
    //use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */



    public function testPathExistence()
    {
        $response = $this->get('/carsReference');
        $response->assertStatus(200);
    }


    public function testAccessorTest()
    {
        // load post manually first
        $db_car = DB::select('select * from cars where id = 2');
        $db_car_name_driver = ucfirst($db_car[0]->name_driver);

        // load post using Eloquent
        $model_car = Car::find(2);
        $model_car_name_driver = $model_car->name_driver;

        $this->assertEquals($db_car_name_driver, $model_car_name_driver);
    }


    public function testCreateUser() {
       parent::setUp();
       $user = $this->user = factory(User::class)->create();
       $this->assertNotEmpty($user);

    }

    public function testCreateCar() {
        parent::setUp();
        $car = $this->car = factory(Car::class)->create();
        $this->assertNotEmpty($car);
    }
}
