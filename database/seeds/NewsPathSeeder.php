<?php

use Illuminate\Database\Seeder;
use App\Models\NewsPath;

class NewsPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsPath::truncate();

        $news_paths = [
        	'source' => 'AutoPro.com.vn',
        	'main_path' => 'https://autopro.com.vn/van-hoa-xe.chn',
        	'detail_path' => 'https://autopro.com.vn/',
        	'list' => '.lstnews ul>li',
        	'content' => '.maindetail>.news-details',
        	'ava_element' => 'a>img',
        	'href_element' => 'a',
        	'title_element' => 'h3',
        	'active' =>1
        ];

        NewsPath::create($news_paths);
    }
}
