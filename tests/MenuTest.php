<?php

// use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    public function testAccountLink()
    {
        // Guest users
        $this->visit('/')
            ->dontSee('Account');

        $user = $this->createUser();

        $this->actingAs($user)
           ->visit('/')
            ->see('Account')
            ->click('Account')
            ->seePageIs('account')
            ->see('My Account');
    }
}
