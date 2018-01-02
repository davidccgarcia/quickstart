<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditProfileTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
    * Test edit profile
    *
    */
    public function testEditProfile()
    {        
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('account')
            ->click('Edit profile')
            ->seePageIs('account/edit-profile')
            ->see('Edit Profile')
            ->type('Mariano Di Vaio', 'name')
            ->press('Update profile')
            ->seePageIs('account')
            ->seeInDatabase('users', [
                'name' => $user->name
            ]);
    }
}
