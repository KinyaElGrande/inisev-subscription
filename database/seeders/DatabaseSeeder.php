<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use App\Models\WebsiteSubscription;
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
        User::factory(100)->create();
        Website::factory(100)->create();
        WebsiteSubscription::factory(100)->create();
        Post::factory(1000)->create();
    }
}
