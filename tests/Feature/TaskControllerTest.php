<?php

namespace Feature;

use App\Models\{Task, User};
use App\Task\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user, 'sanctum');
    }

    public function test_if_it_will_index_returns_tasks()
    {
        Task::factory()->count(3)->create(['created_by' => $this->user->id]);

        $response = $this->getJson(route('tasks.index'));

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_if_it_will_show_returns_task()
    {
        $task = Task::factory()->create(['created_by' => $this->user->id]);

        $response = $this->getJson(route('tasks.show', $task->id));

        $response->assertStatus(200)
            ->assertJson(['id' => $task->id]);
    }

    public function test_if_it_will_store_creates_task()
    {
        $taskData = Task::factory()->create([
            'created_by' => $this->user->id,
            'assigned_to' => User::factory()->create()->id,
            'status' => Status::DONE(),
            'due_date' => now()->addDays(3),
        ])->toArray();

        $response = $this->postJson(route('tasks.store'), $taskData);

        $response->assertStatus(201)
            ->assertJson(['title' => $taskData['title']]);
    }

    public function test_if_it_will_update_modifies_task()
    {
        $task = Task::factory()->create(['created_by' => $this->user->id]);
        $updatedData = ['title' => 'Updated Title'];

        $response = $this->putJson(route('tasks.update', $task->id), $updatedData);

        $response->assertStatus(200)
            ->assertJson(['title' => 'Updated Title']);
    }

    public function test_if_it_will_destroy_deletes_task()
    {
        $task = Task::factory()->create(['created_by' => $this->user->id]);

        $response = $this->deleteJson(route('tasks.destroy', $task->id));

        $response->assertStatus(200)
            ->assertJson(['message' => 'Task deleted successfully']);
    }
}
