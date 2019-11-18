<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GameTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/games');

        $response->assertStatus(200);
    }
    public function testDatabaseGame()
    {
        $this->assertDatabaseHas('games', [
            'title' => 'Call of Duty Modern Warefare'
        ]);

        $this->assertDatabaseHas('games', [
            'description' => 'Fast paced shooter'
        ]);

        $this->assertDatabaseHas('games', [
            'genre' => 'shooter'
        ]);

        $this->assertDatabaseHas('games', [
            'platform' => 'PC, Xbox, PS4'
        ]);

        $this->assertDatabaseHas('games', [
            'perspective' => 'FPS'
        ]);
    }
}
