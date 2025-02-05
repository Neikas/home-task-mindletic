<?php

namespace Tests\Feature;

use App\Models\Psychologist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PsychologistControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $dropViews = true;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_a_list_of_psychologists()
    {
        Psychologist::factory()->count(5)->create();
        $response = $this->getJson('/api/psychologists');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    /** @test */
    public function it_can_create_a_new_psychologist()
    {
        $data = [
            'name' => 'Dr. John Doe',
            'email' => 'john.doe@example.com',
        ];

        $response = $this->postJson('/api/psychologists', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('psychologists', [
            'name' => 'Dr. John Doe',
            'email' => 'john.doe@example.com',
        ]);

        $response->assertJsonFragment([
            'name' => 'Dr. John Doe',
            'email' => 'john.doe@example.com',
        ]);
    }
}
