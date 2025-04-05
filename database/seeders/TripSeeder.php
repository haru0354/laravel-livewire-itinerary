<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::insert([
            [
                'user_id'    => 1,
                'start_date' => '2025-06-01',
                'end_date'   => '2025-06-05',
                'title'      => '北海道旅行',
                'destination' => '北海道',
            ],
            [
                'user_id'    => 1,
                'start_date' => '2025-07-10',
                'end_date'   => '2025-07-15',
                'title'      => '沖縄バカンス',
                'destination' => '沖縄',
            ],
            [
                'user_id'    => 1,
                'start_date' => '2025-08-20',
                'end_date'   => '2025-08-25',
                'title'      => '京都歴史巡り',
                'destination' => '京都',
            ],
            [
                'user_id'    => 1,
                'start_date' => '2025-09-05',
                'end_date'   => '2025-09-10',
                'title'      => '東京観光',
                'destination' => '東京',
            ],
            [
                'user_id'    => 1,
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-05',
                'title'      => '長野ハイキング',
                'destination' => '長野',
            ],
            [
                'user_id'    => 2,
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-05',
                'title'     => '大阪旅行',
                'destination' => '大阪',
            ],
        ]);
    }
}
