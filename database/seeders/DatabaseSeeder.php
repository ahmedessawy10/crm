<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\SettingSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(["id" => 1], [
            'name'     => 'admin',
            'email'    => 'admin@hadaj.com',
            'password' => Hash::make("12345678"),
            "role"     => 1,
        ]);

        $this->call([
            SettingSeeder::class,
            HeroSectionSeeder::class,
            WhyUsSeeder::class,
            StatisticsSeeder::class,
        ]);
    }
}
