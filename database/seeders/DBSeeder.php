<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use App\Models\KandidatXLowongan;
use App\Models\lowongan;
use Illuminate\Database\Seeder;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobPostings = [
            [
                'judul' => 'UI/UX Designer',
                'deskripsi' => 'Lowongan untuk UI/UX Designer dengan kreativitas tinggi.',
                'lokasi' => 'Bandung',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'tanggal_ditutup' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Marketing Manager',
                'deskripsi' => 'Mencari Marketing Manager untuk mengembangkan strategi pemasaran.',
                'lokasi' => 'Yogyakarta',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'tanggal_ditutup' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Full Stack Developer',
                'deskripsi' => 'Lowongan untuk Full Stack Developer dengan pengalaman lebih dari 3 tahun.',
                'lokasi' => 'Surabaya',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'tanggal_ditutup' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'HR Specialist',
                'deskripsi' => 'Mencari HR Specialist yang berpengalaman dalam manajemen sumber daya manusia.',
                'lokasi' => 'Jakarta',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'tanggal_ditutup' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Data Scientist',
                'deskripsi' => 'Lowongan untuk Data Scientist dengan kemampuan analisis data mendalam.',
                'lokasi' => 'Bandung',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'tanggal_ditutup' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jobPostings as $jobPosting) {
            lowongan::create($jobPosting);
        }

        $kandidats = Kandidat::whereBetween('id', [29, 53])->pluck('id')->toArray();

        foreach ($kandidats as $kandidatId) {

            $randomLowongan = collect([1, 2, 3, 4, 5])->random(1);
            KandidatXLowongan::create([
                'lowongan_id' => $randomLowongan[0],
                'kandidat_id' => $kandidatId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
