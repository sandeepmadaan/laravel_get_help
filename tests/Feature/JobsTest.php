<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Category;

class JobsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_only_authenticated_user_can_create_job()
    {
        $attributes = factory('App\Job')->raw();
        $this->post('/jobs', $attributes)->assertRedirect('login');
    }

    public function test_a_user_can_post_a_job()
    {   
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $attributes = factory('App\Job')->raw(['user_id' => $user->id]);
        $this->post('/jobs', $attributes);
        $this->assertDatabaseHas('jobs', $attributes);
    }

    public function test_job_requires_title() {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory('App\Job')->raw(['title' => '']);
        $this->post('/jobs', $attributes)->assertSessionHasErrors('title');
    }

    public function test_job_requires_description() {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory('App\Job')->raw(['description' => '']);
        $this->post('/jobs', $attributes)->assertSessionHasErrors('description');
    }

    public function test_a_user_can_view_a_job() {
        $job = factory('App\Job')->create();
        $this->actingAs(factory(User::class)->create());
        $this->get('/jobs')->assertSee($job->title)->assertSee($job->description);
    }

    public function test_a_user_with_empty_joblist() {
        $this->actingAs(factory(User::class)->create());
        $this->get('/jobs')->assertSee('No Jobs!');
    }
}
