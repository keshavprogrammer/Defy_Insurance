<?php

use Illuminate\Database\Seeder;
use App\Models\Staticpage;

class StaticpageTableSeeder extends Seeder
{

	protected $staticpages = [
        [
            'page_title' => 'Home'
        ],
        [
            'page_title' => 'About us'
        ],
        [
            'page_title' => 'Contact us'
        ],
        [
            'page_title' => 'Terms and Condition'
        ],
        [
            'page_title' => 'Privacy Policy'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach ($this->staticpages as $staticpage) {
    		Staticpage::create([
    			"page_title" => $staticpage["page_title"]
    		]);
    	}
    }
}
