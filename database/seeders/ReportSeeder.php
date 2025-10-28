<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $reporter = User::query()->first() ?? User::factory()->create([
            'name' => 'Reporter Demo',
            'email' => 'reporter@example.com',
        ]);

        $reports = [
            [
                'user_id' => $reporter->id,
                'reported_name' => 'Andi Pratama',
                'reported_class' => 'XI IPA 2',
                'incident_time' => Carbon::parse('2025-10-01 08:30:00'),
                'description' => 'Melaporkan tindakan perundungan saat jam istirahat.',
                'photo_path' => null,
                'status' => 'dilaporkan',
                'counselor_note' => null,
            ],
            [
                'user_id' => $reporter->id,
                'reported_name' => 'Siti Nurhaliza',
                'reported_class' => 'XI IPS 1',
                'incident_time' => Carbon::parse('2025-10-05 10:15:00'),
                'description' => 'Terjadi pertengkaran di kelas yang memerlukan tindak lanjut.',
                'photo_path' => 'reports/photos/siti-nurhaliza.jpg',
                'status' => 'direview',
                'counselor_note' => 'Sedang dikonfirmasi dengan wali kelas.',
            ],
            [
                'user_id' => $reporter->id,
                'reported_name' => 'Budi Santoso',
                'reported_class' => 'XII IPA 1',
                'incident_time' => Carbon::parse('2025-10-10 13:45:00'),
                'description' => 'Laporan tindakan merokok di area sekolah.',
                'photo_path' => null,
                'status' => 'diproses',
                'counselor_note' => 'Sudah dijadwalkan sesi konseling minggu depan.',
            ],
        ];

        foreach ($reports as $report) {
            Report::query()->updateOrCreate(
                [
                    'user_id' => $report['user_id'],
                    'reported_name' => $report['reported_name'],
                    'incident_time' => $report['incident_time'],
                ],
                $report
            );
        }
    }
}
