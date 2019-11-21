<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/groups');

        $response->assertStatus(200);
    }
    public function testDatabaseGame()
    {        
        $this->assertDatabaseHas('groups', [
            'name' => 'Gamer Guys'
        ]);

        $this->assertDatabaseHas('groups', [
            'game_id' => 'Sonic \'06'
        ]);

        $this->assertDatabaseHas('groups', [
            'type' => 'Just for Fun'
        ]);

        $this->assertDatabaseHas('groups', [
            'description' => 'A group for guys who love games'
        ]);
    }
}
