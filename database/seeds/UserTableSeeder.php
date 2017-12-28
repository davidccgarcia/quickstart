<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'David García', 
            'email' => 'ccristhiangarcia@gmail.com', 
            'password' => bcrypt('12345'), 
            'role' => 'admin'
        ]);

        factory(App\User::class, 49)->create();
    }
}
