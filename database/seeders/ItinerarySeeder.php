<?php

namespace Database\Seeders;

use App\Models\Itinerary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Itinerary::insert([
            [
                'trip_id'        => 1,
                'user_id'        => 1,
                'date_and_time'  => '2025-06-01 09:00:00',
                'title'          => '北海道到着',
                'content'        => '新千歳空港に到着',
                'hide_content'   => '新千歳空港に到着',
                'image_url'      => '',
                'image_alt'      => ''
            ],
            [
                'trip_id'        => 1,
                'user_id'        => 1,
                'date_and_time'  => '2025-06-01 12:00:00',
                'title'          => '札幌観光',
                'content'        => '時計台や大通公園を散策',
                'hide_content'   => 'ラーメン横丁で昼食',
                'image_url'      => '',
                'image_alt'      => ''
            ],
            [
                'trip_id'        => 1,
                'user_id'        => 1,
                'date_and_time'  => '2025-06-02 10:00:00',
                'title'          => '小樽観光',
                'content'        => '運河沿いを散策',
                'hide_content'   => 'スイーツ店めぐり',
                'image_url'      => '',
                'image_alt'      => ''
            ],
            [
                'trip_id'        => 1,
                'user_id'        => 1,
                'date_and_time'  => '2025-06-03 15:00:00',
                'title'          => '登別温泉',
                'content'        => '温泉でリラックス',
                'hide_content'   => '足湯を楽しむ',
                'image_url'      => '',
                'image_alt'      => ''
            ],
            [
                'trip_id'        => 1,
                'user_id'        => 1,
                'date_and_time'  => '2025-06-05 08:00:00',
                'title'          => '帰宅',
                'content'        => '空港に向かう',
                'hide_content'   => 'お土産購入',
                'image_url'      => '',
                'image_alt'      => ''
            ],
            [
                'trip_id'        => 5,
                'user_id'        => 2,
                'date_and_time'  => '2025-07-10 10:00:00',
                'title'          => '大阪到着',
                'content'        => '関西国際空港に到着',
                'hide_content'   => '3番出口より出て、レンタカーを借りる',
                'image_url'      => '',
                'image_alt'      => ''
            ],
        ]);
    }
}