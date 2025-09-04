<?php
namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $images = [
            "annie-spratt-QckxruozjRg-unsplash.jpg",
            "pexels-ollycopy.jpg",
            "pexels-nappy-936137.jpg",
        ];

        HeroSection::updateOrCreate(
            ["id" => 1],
            [
                "title"   => [
                    "ar" => "عنوان بالعربي",
                    "en" => "Title in English",
                ],
                "content" => [
                    "ar" => "محتوى بالعربي",
                    "en" => "Content in English",
                ],
                "image1"  => $this->copyToStorage($images[0]),
                "image2"  => $this->copyToStorage($images[1]),
                "image3"  => $this->copyToStorage($images[2]),
            ]
        );
    }

    private function copyToStorage($fileName)
    {
        $sourcePath = public_path("assets/images/" . $fileName);

        if (file_exists($sourcePath)) {
            Storage::disk("public")->put($fileName, file_get_contents($sourcePath));
            return $fileName;
        }

        return null;
    }
}
