<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test profile is created and associated with a user.
     *
     * @return void
     */
    public function testProfileIsAssociatedToUser()
    {
        $user = factory(\App\User::class)->create();
        $profile = factory(\App\Profile::class)->make();

        $profile->user()->associate($user);
        $createdProfile = $profile->save();
        $this->assertTrue($createdProfile);
    }
}
