<?php

use App\Model\User;
use App\Model\Task;
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
        factory(User::class, 1)->states('test')->create()->each(function ($user) {
            $user->tasks()->saveMany(factory(Task::class, 10)->make());
        });
        factory(User::class, 3)->create()->each(function ($user) {
            $user->tasks()->saveMany(factory(Task::class, 10)->make());
        });
    }
}
