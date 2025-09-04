<?php
namespace Database\Seeders;

use App\Models\WhyUs;
use Illuminate\Database\Seeder;

class WhyUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                "title"   => [
                    "ar" => "نموذج أعمال قابل للتوسع والنمو",
                    "en" => "A scalable and growth-oriented business model",
                ],
                "content" => [
                    "ar" => "خروج أكثر من 20 مشروعًا ناشئًا بنماذج أعمال محسّنة تعتمد على حلول واقعية ناتجة عن جلسات التوأمة والتطوير الجماعي، مما يعزز جاهزيتها للاستثمار أو الاحتضان الفوري.",
                    "en" => "More than 20 startups emerged with improved business models based on real solutions, resulting from twinning and collective development sessions, enhancing their readiness for investment or immediate incubation.",
                ],
                "icon"    => "fa-solid fa-chart-line",
            ],
            [
                "title"   => [
                    "ar" => "فرصة استثمارية موجهة",
                    "en" => "Targeted investment opportunity",
                ],
                "content" => [
                    "ar" => "تهيئة منصة حيّة للمستثمرين لاكتشاف مشاريع شابة واعدة تم اختبارها وتطويرها ضمن بيئة عملية، مما يسهل اتخاذ قرارات الاستثمار المباشر أو عقد شراكات تجارية.",
                    "en" => "Providing a live platform for investors to discover promising young projects that have been tested and developed in a practical environment, facilitating direct investment decisions or forming business partnerships.",
                ],
                "icon"    => "fa-solid fa-handshake",
            ],
            [
                "title"   => [
                    "ar" => "تأسيس شبكة علاقات ريادية مستدامة",
                    "en" => "Building a sustainable entrepreneurial network",
                ],
                "content" => [
                    "ar" => "خلق منظومة أعمال وبناء روابط تعاون استراتيجية بين المشاركين، تُسهم في شراكات مستقبلية عابرة للحدود، وتفتح آفاق المبادرات المستمرة بين السعودية وقطر.",
                    "en" => "Creating a business ecosystem and building strategic cooperation links between participants, contributing to future cross-border partnerships and opening opportunities for continuous initiatives between Saudi Arabia and Qatar.",
                ],
                "icon"    => "fa-solid fa-network-wired",
            ],
            [
                "title"   => [
                    "ar" => "محتوى توثيقي احترافي يعزز المسؤولية الاجتماعية",
                    "en" => "Professional documentation content that enhances social responsibility",
                ],
                "content" => [
                    "ar" => "إنتاج تقارير مرئية وقصص نجاح موثقة تسهم في تعزيز الصورة الدعائية للجهات الداعمة وتوفير محتوى مؤثر يدخل في تقارير المسؤولية الاجتماعية CSR ويُستخدم في الحملات الإعلانية.",
                    "en" => "Producing visual reports and documented success stories that contribute to enhancing the promotional image of supporting entities and providing impactful content used in CSR reports and advertising campaigns.",
                ],
                "icon"    => "fa-solid fa-file-alt",
            ],
        ];

        foreach ($array as $item) {
            WhyUs::updateOrCreate(
                ['title->ar' => $item['title']['ar']], // الشرط (مفتاح فريد بالعربي مثلاً)
                $item                                  // البيانات كلها
            );

        }
    }
}
