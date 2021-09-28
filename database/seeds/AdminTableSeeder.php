<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$adminUser = array(
    		"name" => "Admin",
    		"username" => "admin",
    		"email" => "admin@admin.com",
    		"password" => bcrypt("admin")
    	);
        Admin::create($adminUser);
    }
}
