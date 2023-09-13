<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class IventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ivents')->insert([
            'title' => '新歓イベント！',
            'ivent_overview' => '新入生大歓迎！',
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('ivents')->insert([
            'title' => '活動紹介イベント',
            'ivent_overview' => '私達の活動を紹介するイベントを開催します',
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('ivents')->insert([
            'title' => '新歓ライブ開催！',
            'ivent_overview' => 'ライブを開催します',
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
