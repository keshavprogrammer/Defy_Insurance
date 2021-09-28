<?php

use Illuminate\Database\Seeder;
use App\Models\How_hear_about;

class HowHearAboutsTableSeeder extends Seeder
{
	protected $datas = [
        [
            'name' => 'From Social Media'
        ],
        [
            'name' => 'From Friend'
        ],
        [
            'name' => 'From Google search'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->datas as $data) {
    		How_hear_about::create([
    			"name" => $data["name"]
    		]);
    	}
    }
}
