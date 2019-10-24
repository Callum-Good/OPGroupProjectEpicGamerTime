<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageCheck extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouteEditProfile()
    {
        $response=$this->get("/editProfile");
        $response->assertStatus(200);
    }

    public function testRouteGames()
    {
        $response=$this->get("/games");
        $response->assertStatus(200);
    }
}
