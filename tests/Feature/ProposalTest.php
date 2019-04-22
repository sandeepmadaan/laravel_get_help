<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProposalTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_only_authenticated_user_can_add_job()
    {
        $attributes = factory('App\Proposal')->raw();
        $this->post('/proposals', $attributes)->assertRedirect('login');
    }
}
