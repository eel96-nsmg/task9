<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       factory(App\User::class, 20)->create();
       factory(App\Client::class, 20)->create();
       factory(App\Tag::class, 50)->create();
       factory(App\Category::class, 30)->create();
       factory(App\History::class, 200)->create();
    }
}
