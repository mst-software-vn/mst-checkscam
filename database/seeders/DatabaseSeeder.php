<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SettingSeeder::class);
        $this->call(BannerSeeder::class);
        User::factory()->create([
            'username' => 'htuanqn',
            'email' => 'tuan@mstsoftware.vn',
            'password' => Hash::make('tuan@mstsoftware.vn'),
            'full_name' => 'Phạm Hoàng Tuấn',
            'role' => 'admin',
            'status' => 1,
        ]);
        User::factory()->create([
            'username' => 'maaitlunghau',
            'email' => 'trunghau@mstsoftware.vn',
            'password' => Hash::make('admin@123'),
            'full_name' => 'Mai Trung Hậu',
            'role' => 'admin',
            'status' => 1,
        ]);

        Report::factory()->count(50)->create();
        Insurance::factory()->count(200)->create();
        Post::factory()->count(30)->create();
        User::factory()->count(2)->create();

        $approvedReports = Report::where('status', 'approved')->get();

        $approvedReports->each(function ($report) {
            $count = fake()->numberBetween(2, 8);
            Comment::factory($count)->create([
                'report_id' => $report->id,
            ]);
        });
    }
}
