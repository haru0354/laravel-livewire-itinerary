<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Memo;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Memo::insert([
            [
                'trip_id' => 1,
                'user_id' => 1,
                'title' => '北海道の観光',
                'content' => '札幌、函館、小樽を巡る予定'
            ],
            [
                'trip_id' => 1,
                'user_id' => 1,
                'title' => '沖縄のアクティビティ',
                'content' => 'シュノーケリングとダイビング'
            ],
            [
                'trip_id' => 1,
                'user_id' => 1,
                'title' => '京都の観光',
                'content' => '清水寺と伏見稲荷大社'
            ],
            [
                'trip_id' => 1,
                'user_id' => 1,
                'title' => '福岡のグルメ',
                'content' => 'ラーメンと屋台巡り'
            ],
            [
                'trip_id' => 1,
                'user_id' => 1,
                'title' => '北海道のお土産',
                'content' => '白い恋人とじゃがポックル'
            ],
            [
                'trip_id' => 5,
                'user_id' => 2,
                'title' => '大阪の観光スポット',
                'content' => '道頓堀とユニバーサル・スタジオ・ジャパン',
            ],
        ]);
    }
}
