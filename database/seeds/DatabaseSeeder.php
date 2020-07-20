<?php

use Illuminate\Database\Seeder;
use App\Menu;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Menu::class, 2)->create();
    }
}
