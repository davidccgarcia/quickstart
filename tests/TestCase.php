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

    public function seeInField($selector, $expected)
    {
        $this->assertSame(
            $expected, 
            $this->getInputOrTextAreaValue($selector), 
            "The input [$selector] has not the expected value [$expected]."
        );

        return $this;
    }

    public function getInputOrTextAreaValue($selector)
    {
        // Get the HTML field
        $field = $this->filterByNameOrId($selector);

        if ($field->count() == 0) {
            throw new \Exception("There are no elements wit the name o ID [$selector]");
        }

        // Get element type
        $element = $field->nodeName();

        if ($element == 'input') {
            // Get the current value
            return $field->attr('value');
        }

        if ($element == 'textarea') {
            // Get the current value
            return $field->text();
        }

        throw new \Exception("[$selector] is neither an input nor a textarea");
    }
}
