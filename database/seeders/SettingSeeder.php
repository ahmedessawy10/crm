<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            "app_name"         => [
                "ar" => "هيداج",
                "en" => "HEDAJ",
            ],
            'about_us'         => [
                'ar' => 'معلومات عنا',
                'en' => 'About us',
            ],
            'default_language' => 'ar',
            'logo'             => null,

        ];
        Setting::updateOrCreate(
            ['id' => 1], // Where condition — singleton
            $data        // Data to insert/update
        );

    }
}
