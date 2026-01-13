<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['time' => '08:00 – 09:15', 'activity' => 'Open Gate', 'icon' => '🚪', 'color' => 'bg-green-100 text-green-800'],
            ['time' => '09:15 – 10:00', 'activity' => 'Soft Opening with MC Live', 'icon' => '🎤', 'color' => 'bg-blue-100 text-blue-800'],
            ['time' => '10:00 – 10:30', 'activity' => 'Say "Welcome" to PNB', 'icon' => '👋', 'color' => 'bg-yellow-100 text-yellow-800'],
            ['time' => '10:30 – 11:00', 'activity' => 'Opening With - MC Live', 'icon' => '🎪', 'color' => 'bg-red-100 text-red-800'],
            ['time' => '11:00 – 11:30', 'activity' => 'Kata Sambutan: Rektor Politeknik', 'icon' => '🎓', 'color' => 'bg-purple-100 text-purple-800'],
            ['time' => '11:30 – 12:00', 'activity' => 'Kata Sambutan: Kepala Dinas Pendidikan', 'icon' => '📚', 'color' => 'bg-indigo-100 text-indigo-800'],
            ['time' => '12:00 – 12:30', 'activity' => 'Penandatanganan MoU antara Politeknik Negeri Batam dengan Universitas Internasional Batam', 'icon' => '📝', 'color' => 'bg-pink-100 text-pink-800'],
            ['time' => '12:30 – 13:00', 'activity' => 'Hybrid Workshop', 'icon' => '💻', 'color' => 'bg-cyan-100 text-cyan-800'],
            ['time' => '13:00 – 13:15', 'activity' => 'Cekin Mingguan + Closing Booth + Info Lainnya', 'icon' => '✅', 'color' => 'bg-emerald-100 text-emerald-800'],
            ['time' => '13:15 – 17:00', 'activity' => 'Berfoto Bersama Campus Expo', 'icon' => '📸', 'color' => 'bg-orange-100 text-orange-800'],
            ['time' => '17:00 – 17:45', 'activity' => 'MC Show & Enjoy', 'icon' => '🎭', 'color' => 'bg-red-100 text-red-800'],
            ['time' => '17:45 – 19:00', 'activity' => 'Games + Prize', 'icon' => '🎮', 'color' => 'bg-green-100 text-green-800'],
            ['time' => '19:00 – 19:30', 'activity' => 'Bazar Perpustakaan + 100 Uang', 'icon' => '💰', 'color' => 'bg-yellow-100 text-yellow-800'],
            ['time' => '19:30 – 20:00', 'activity' => 'Festival Kuliner', 'icon' => '🍕', 'color' => 'bg-red-100 text-red-800'],
            ['time' => '20:00 – 20:15', 'activity' => 'Talk Show: Mahasiswa Hebat Masa Depan Indonesia', 'icon' => '🗣️', 'color' => 'bg-blue-100 text-blue-800'],
            ['time' => '20:15 – 20:30', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-purple-100 text-purple-800'],
            ['time' => '20:30 – 20:45', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📖', 'color' => 'bg-indigo-100 text-indigo-800'],
            ['time' => '20:45 – 21:00', 'activity' => 'Zummo + Photo', 'icon' => '💃', 'color' => 'bg-pink-100 text-pink-800'],
            ['time' => '21:00 – 21:30', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📚', 'color' => 'bg-cyan-100 text-cyan-800'],
            ['time' => '21:30 – 22:00', 'activity' => 'Live Music', 'icon' => '🎵', 'color' => 'bg-emerald-100 text-emerald-800'],
            ['time' => '22:00 – 22:30', 'activity' => 'Talk Show: Mahasiswa, Profesi, & Cerita di Era Digital', 'icon' => '💻', 'color' => 'bg-orange-100 text-orange-800'],
            ['time' => '22:30 – 22:45', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-red-100 text-red-800'],
            ['time' => '22:45 – 23:00', 'activity' => 'Bazar Perpustakaan + 100 Uang', 'icon' => '💰', 'color' => 'bg-green-100 text-green-800'],
            ['time' => '23:00 – 23:15', 'activity' => 'Karaoke + Photo', 'icon' => '🎤', 'color' => 'bg-yellow-100 text-yellow-800'],
            ['time' => '23:15 – 23:30', 'activity' => 'Safari Perpustakaan + 100 Uang', 'icon' => '📖', 'color' => 'bg-blue-100 text-blue-800'],
            ['time' => '23:30 – 23:45', 'activity' => 'Work Shop + Berfoto', 'icon' => '🔧', 'color' => 'bg-purple-100 text-purple-800'],
            ['time' => '23:45 – 00:00', 'activity' => 'Talk Show with Mahasiswa: Campus Funfest', 'icon' => '🎪', 'color' => 'bg-indigo-100 text-indigo-800'],
            ['time' => '00:00 – 00:15', 'activity' => 'Tanya Jawab', 'icon' => '❓', 'color' => 'bg-pink-100 text-pink-800'],
            ['time' => '00:15 – 00:30', 'activity' => 'Open Pengunjung + 100 Uang', 'icon' => '🚪', 'color' => 'bg-cyan-100 text-cyan-800'],
            ['time' => '00:30 – 00:45', 'activity' => 'Break Snack + Cheese', 'icon' => '🧀', 'color' => 'bg-emerald-100 text-emerald-800'],
            ['time' => '00:45 – 01:00', 'activity' => 'Enjoy Pengunjung + 100 Uang', 'icon' => '🎉', 'color' => 'bg-orange-100 text-orange-800'],
            ['time' => '01:00 – 01:15', 'activity' => 'MC Close to Stage', 'icon' => '🎭', 'color' => 'bg-red-100 text-red-800'],
            ['time' => '01:15 – 01:30', 'activity' => 'Barista + Trivia', 'icon' => '☕', 'color' => 'bg-green-100 text-green-800'],
            ['time' => '01:30 – 01:45', 'activity' => 'Menggambar dan Impresi', 'icon' => '🎨', 'color' => 'bg-yellow-100 text-yellow-800'],
            ['time' => '01:45 – 02:00', 'activity' => 'Live Music + Bingo', 'icon' => '🎵', 'color' => 'bg-blue-100 text-blue-800'],
            ['time' => '02:00 – 02:15', 'activity' => 'Pengumuman Acara - Start BCT 2026', 'icon' => '📢', 'color' => 'bg-purple-100 text-purple-800'],
            ['time' => '02:15 – 02:30', 'activity' => 'Close Gate', 'icon' => '🚪', 'color' => 'bg-gray-100 text-gray-800']
        ];

        foreach ($activities as $index => $data) {
            Kegiatan::create([
                'time' => $data['time'],
                'activity' => $data['activity'],
                'icon' => $data['icon'],
                'color' => $data['color'],
                'order' => $index,
            ]);
        }
    }
}
