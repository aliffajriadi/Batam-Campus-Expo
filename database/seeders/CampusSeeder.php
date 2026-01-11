<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    public function run(): void
    {
        $kampuses = [
            [
                'name_campus' => 'Universitas Indonesia',
                'singkatan' => 'UI',
                'location' => 'Depok, Jawa Barat',
                'kota' => 'Depok',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Universitas Indonesia adalah perguruan tinggi negeri yang terletak di Depok, Jawa Barat dan Jakarta. UI merupakan salah satu universitas terbaik di Indonesia dengan berbagai program studi unggulan.',
                'website' => 'https://www.ui.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1950,
                'jumlah_mahasiswa' => 47000,
                'fakultas' => ['Kedokteran', 'Teknik', 'FISIP', 'Ekonomi dan Bisnis', 'Hukum', 'MIPA', 'FIB', 'Psikologi', 'Kesehatan Masyarakat', 'Ilmu Keperawatan', 'Farmasi', 'Kedokteran Gigi']
            ],
            [
                'name_campus' => 'Institut Teknologi Bandung',
                'singkatan' => 'ITB',
                'location' => 'Bandung, Jawa Barat',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Institut Teknologi Bandung adalah sebuah perguruan tinggi negeri yang bergerak dalam bidang sains dan teknologi. ITB dikenal sebagai kampus teknik terbaik di Indonesia.',
                'website' => 'https://www.itb.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1959,
                'jumlah_mahasiswa' => 25000,
                'fakultas' => ['FMIPA', 'FITB', 'FTTM', 'FTSL', 'SAPPK', 'SBM', 'FSRD', 'FTI', 'STEI', 'SF']
            ],
            [
                'name_campus' => 'Universitas Gadjah Mada',
                'singkatan' => 'UGM',
                'location' => 'Yogyakarta, DI Yogyakarta',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'deskripsi' => 'Universitas Gadjah Mada adalah universitas negeri tertua di Indonesia yang didirikan pada masa kemerdekaan. UGM memiliki reputasi yang sangat baik dalam berbagai bidang ilmu.',
                'website' => 'https://ugm.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1949,
                'jumlah_mahasiswa' => 55000,
                'fakultas' => ['Kedokteran', 'Teknik', 'Pertanian', 'Peternakan', 'Kehutanan', 'MIPA', 'Psikologi', 'FISIPOL', 'Ekonomika dan Bisnis', 'FIB', 'Hukum', 'Farmasi', 'Kedokteran Gigi', 'Kedokteran Hewan', 'Geografi', 'Biologi', 'Teknologi Pertanian', 'Sekolah Vokasi']
            ],
            [
                'name_campus' => 'Institut Pertanian Bogor',
                'singkatan' => 'IPB',
                'location' => 'Bogor, Jawa Barat',
                'kota' => 'Bogor',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Institut Pertanian Bogor adalah perguruan tinggi negeri yang fokus pada bidang pertanian, kehutanan, dan ilmu hayati. IPB merupakan universitas terdepan dalam bidang pertanian di Indonesia.',
                'website' => 'https://ipb.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1963,
                'jumlah_mahasiswa' => 32000,
                'fakultas' => ['Pertanian', 'Kedokteran Hewan', 'Perikanan dan Ilmu Kelautan', 'Peternakan', 'Kehutanan', 'Teknologi Pertanian', 'MIPA', 'Ekonomi dan Manajemen', 'Ekologi Manusia']
            ],
            [
                'name_campus' => 'Universitas Airlangga',
                'singkatan' => 'UNAIR',
                'location' => 'Surabaya, Jawa Timur',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'deskripsi' => 'Universitas Airlangga adalah universitas negeri yang terletak di Surabaya. UNAIR dikenal memiliki fakultas kedokteran dan kesehatan yang sangat baik.',
                'website' => 'https://unair.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1954,
                'jumlah_mahasiswa' => 35000,
                'fakultas' => ['Kedokteran', 'Kedokteran Gigi', 'Kedokteran Hewan', 'Farmasi', 'Psikologi', 'Ilmu Sosial dan Ilmu Politik', 'Hukum', 'Ekonomi dan Bisnis', 'Sains dan Teknologi', 'Kesehatan Masyarakat', 'Keperawatan', 'Perikanan dan Kelautan', 'Vokasi']
            ],
            [
                'name_campus' => 'Universitas Brawijaya',
                'singkatan' => 'UB',
                'location' => 'Malang, Jawa Timur',
                'kota' => 'Malang',
                'provinsi' => 'Jawa Timur',
                'deskripsi' => 'Universitas Brawijaya adalah universitas negeri yang terletak di Malang, Jawa Timur. UB memiliki berbagai fakultas unggulan dan suasana kampus yang sejuk.',
                'website' => 'https://ub.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1963,
                'jumlah_mahasiswa' => 65000,
                'fakultas' => ['Hukum', 'Ekonomi dan Bisnis', 'Ilmu Administrasi', 'Pertanian', 'Peternakan', 'Teknik', 'Kedokteran', 'Perikanan dan Ilmu Kelautan', 'MIPA', 'Teknologi Pertanian', 'ISIP', 'Ilmu Budaya', 'Kedokteran Gigi', 'Ilmu Komputer', 'Kedokteran Hewan', 'Vokasi']
            ],
            [
                'name_campus' => 'Politeknik Negeri Batam',
                'singkatan' => 'Polibatam',
                'location' => 'Batam, Kepulauan Riau',
                'kota' => 'Batam',
                'provinsi' => 'Kepulauan Riau',
                'deskripsi' => 'Politeknik Negeri Batam adalah satu-satunya politeknik negeri di kawasan perdagangan bebas Batam. Fokus pada pendidikan vokasi yang link-and-match dengan industri.',
                'website' => 'https://www.polibatam.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'Baik Sekali',
                'status' => 'negeri',
                'tahun_berdiri' => 2000,
                'jumlah_mahasiswa' => 8000,
                'fakultas' => ['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektronika', 'Manajemen Bisnis']
            ],
            [
                'name_campus' => 'Universitas Internasional Batam',
                'singkatan' => 'UIB',
                'location' => 'Batam, Kepulauan Riau',
                'kota' => 'Batam',
                'provinsi' => 'Kepulauan Riau',
                'deskripsi' => 'Universitas Internasional Batam (UIB) didirikan pada tahun 2000. UIB berkomitmen untuk menghasilkan lulusan yang kompeten dan siap bersaing di tingkat global.',
                'website' => 'https://www.uib.ac.id',
                'logo_campus' => null,
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 2000,
                'jumlah_mahasiswa' => 6000,
                'fakultas' => ['Teknologi Industri', 'Ekonomi', 'Hukum', 'Ilmu Komputer', 'Teknik Sipil dan Perencanaan', 'Pendidikan']
            ]
        ];

        foreach ($kampuses as $data) {
            Campus::updateOrCreate(
                ['singkatan' => $data['singkatan']],
                $data
            );
        }
    }
}
