<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
    * Creates a test user
    *
    * @param  string $role
    */
    public function createUser($role = 'user')
    {
        return factory(App\User::class)->create([
            'name' => 'Cristhian García', 
            'email' => 'davidg9404@gmail.com', 
            'password' => bcrypt('admin'), 
            'role' => $role, 
        ]);
    }
}
