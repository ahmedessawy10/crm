<?php
namespace Database\Seeders;

use App\Models\Setting;
use App\Upload;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    use Upload;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [

            'logo'             => $this->copyToStorage('Asset 3@4x - Copy.png'),
            'app_name'         => [
                'ar' => 'هيداج',
                'en' => 'HEDAJ',
            ],
            'default_language' => 'ar',
            'facebook_url'     => 'https://facebook.com/example',
            'twitter_url'      => 'https://twitter.com/example',
            'youtube_url'      => 'https://youtube.com/example',
            'instagram_url'    => 'https://instagram.com/example',
            'snapchat_url'     => 'https://snapchat.com/example',
            'about_us'         => [
                'ar' => 'عملنا على صناعة مبادرة خليجية؛
تمكين شباب الأعمال المتخصصة؛
ﻠﻠﺈثراء لاحتضان الريادة والفكرة الجديدة
تبدأ بمحطة التمكين وهي هداج Hub لتساعد المشاركين لتطوير تجربتهم الريادية وتحسين جاهزيتهم قبل الانطلاق في رحلة الاستثمار الحقيقية من خلال هداج Week والتي يستعرض المشاركين منتجاتهم في سوق الأزياء الذي يستعرض تجربة المشاركين مرتين، الأولى بالدوحة والثانية بالرياض لتنتهي رحلة المشاركين عبر هداج Space لفتح آفاق الحوار بين المشاركين لمحاولة تعزيز التغذية الراجعة الأطروحاتهم السابقة.',
                'en' => 'We have worked on creating a Gulf initiative;
Empowering specialized young entrepreneurs;
To enrich and support innovation and new ideas.
It starts with the Empowerment Hub, Hedayj Hub, which helps participants develop their entrepreneurial experience and improve their readiness before embarking on the real investment journey through Hedayj Week, where participants showcase their products in the fashion market, highlighting their experience twice: first in Doha and then in Riyadh. The journey concludes through Hedayj Space, opening dialogue opportunities between participants to help enhance feedback on their previous projects.',
            ],

            'about_us_image'   => $this->copyToStorage('pexels-fauxels-3184419.jpg'),
            'why_us_image'     => $this->copyToStorage('pexels-fauxels-3184419.jpg'),
            'address'          => [
                'ar' => 'الرياض، المملكة العربية السعودية',
                'en' => 'Riyadh, Saudi Arabia',
            ],
            'phone'            => '+966123456789',
            'email'            => 'info@example.com',

        ];
        Setting::updateOrCreate(
            ['id' => 1], // Where condition — singleton
            $data        // Data to insert/update
        );

    }
}
