<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Kandidat;
use App\Models\Lowongan;
use App\Models\KandidatXLowongan;

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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Marketing Manager',
                'deskripsi' => 'Mencari Marketing Manager untuk mengembangkan strategi pemasaran.',
                'lokasi' => 'Yogyakarta',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Full Stack Developer',
                'deskripsi' => 'Lowongan untuk Full Stack Developer dengan pengalaman lebih dari 3 tahun.',
                'lokasi' => 'Surabaya',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'HR Specialist',
                'deskripsi' => 'Mencari HR Specialist yang berpengalaman dalam manajemen sumber daya manusia.',
                'lokasi' => 'Jakarta',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Data Scientist',
                'deskripsi' => 'Lowongan untuk Data Scientist dengan kemampuan analisis data mendalam.',
                'lokasi' => 'Bandung',
                'poster_lowongan' => '',
                'tanggal_dibuka' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jobPostings as $jobPosting) {
            Lowongan::create($jobPosting);
        }

        $kandidats = Kandidat::whereBetween('id', [29, 53])->pluck('id')->toArray();

        foreach ([1,2,3,4,5] as $jobPostingId) {
            $randomKandidats = collect($kandidats)->random(5);

            foreach ($randomKandidats as $kandidatId) {
                KandidatXLowongan::create([
                    'lowongan_id' => $jobPostingId,
                    'kandidat_id' => $kandidatId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
