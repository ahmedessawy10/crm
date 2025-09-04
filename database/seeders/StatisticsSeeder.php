<?php
namespace Database\Seeders;

use App\Models\Statistics;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title'  => [
                    "ar" => "عدد المستخدمين",
                    "en" => "Users",
                ],
                "number" => 640000,
                "icon"   => "fa-solid fa-users",
            ],
            [
                'title'  => [
                    "ar" => "عدد المشاريع",
                    "en" => "Projects",
                ],
                "number" => 120,
                "icon"   => "fa-solid fa-diagram-project",
            ],
            [
                'title'  => [
                    "ar" => "عدد الشركاء",
                    "en" => "Partners",
                ],
                "number" => 50,
                "icon"   => "fa-solid fa-handshake",
            ],
            [
                'title'  => [
                    "ar" => "سنوات الخبرة",
                    "en" => "Years of Experience",
                ],
                "number" => 10,
                "icon"   => "fa-solid fa-clock",
            ],
        ];
        foreach ($data as $item) {
            Statistics::updateOrCreate(
                ['title->en' => $item['title']['en']],
                $item   
            );
        }

    }
}
