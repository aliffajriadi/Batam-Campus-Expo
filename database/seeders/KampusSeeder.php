<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kampus;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kampuses = [
            [
                'nama_kampus' => 'Universitas Indonesia',
                'singkatan' => 'UI',
                'kota' => 'Depok',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Universitas Indonesia adalah perguruan tinggi negeri yang terletak di Depok, Jawa Barat dan Jakarta. UI merupakan salah satu universitas terbaik di Indonesia dengan berbagai program studi unggulan.',
                'website' => 'https://www.ui.ac.id',
                'logo' => 'logos/ui.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1950,
                'jumlah_mahasiswa' => 47000,
                'fakultas' => ['Kedokteran', 'Teknik', 'FISIP', 'Ekonomi dan Bisnis', 'Hukum', 'MIPA', 'FIB', 'Psikologi', 'Kesehatan Masyarakat', 'Ilmu Keperawatan', 'Farmasi', 'Kedokteran Gigi']
            ],
            [
                'nama_kampus' => 'Institut Teknologi Bandung',
                'singkatan' => 'ITB',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Institut Teknologi Bandung adalah sebuah perguruan tinggi negeri yang bergerak dalam bidang sains dan teknologi. ITB dikenal sebagai kampus teknik terbaik di Indonesia.',
                'website' => 'https://www.itb.ac.id',
                'logo' => 'logos/itb.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1959,
                'jumlah_mahasiswa' => 25000,
                'fakultas' => ['FMIPA', 'FITB', 'FTTM', 'FTSL', 'FMIPA', 'SAPPK', 'SBM', 'FSRD', 'FTI', 'STEI', 'SF']
            ],
            [
                'nama_kampus' => 'Universitas Gadjah Mada',
                'singkatan' => 'UGM',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'deskripsi' => 'Universitas Gadjah Mada adalah universitas negeri tertua di Indonesia yang didirikan pada masa kemerdekaan. UGM memiliki reputasi yang sangat baik dalam berbagai bidang ilmu.',
                'website' => 'https://ugm.ac.id',
                'logo' => 'logos/ugm.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1949,
                'jumlah_mahasiswa' => 55000,
                'fakultas' => ['Kedokteran', 'Teknik', 'Pertanian', 'Peternakan', 'Kehutanan', 'MIPA', 'Psikologi', 'FISIPOL', 'Ekonomika dan Bisnis', 'FIB', 'Hukum', 'Farmasi', 'Kedokteran Gigi', 'Kedokteran Hewan', 'Geografi', 'Biologi', 'Teknologi Pertanian', 'Sekolah Vokasi']
            ],
            [
                'nama_kampus' => 'Institut Pertanian Bogor',
                'singkatan' => 'IPB',
                'kota' => 'Bogor',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Institut Pertanian Bogor adalah perguruan tinggi negeri yang fokus pada bidang pertanian, kehutanan, dan ilmu hayati. IPB merupakan universitas terdepan dalam bidang pertanian di Indonesia.',
                'website' => 'https://ipb.ac.id',
                'logo' => 'logos/ipb.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1963,
                'jumlah_mahasiswa' => 32000,
                'fakultas' => ['Pertanian', 'Kedokteran Hewan', 'Perikanan dan Ilmu Kelautan', 'Peternakan', 'Kehutanan', 'Teknologi Pertanian', 'MIPA', 'Ekonomi dan Manajemen', 'Ekologi Manusia']
            ],
            [
                'nama_kampus' => 'Universitas Airlangga',
                'singkatan' => 'UNAIR',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'deskripsi' => 'Universitas Airlangga adalah universitas negeri yang terletak di Surabaya. UNAIR dikenal memiliki fakultas kedokteran dan kesehatan yang sangat baik.',
                'website' => 'https://unair.ac.id',
                'logo' => 'logos/unair.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1954,
                'jumlah_mahasiswa' => 35000,
                'fakultas' => ['Kedokteran', 'Kedokteran Gigi', 'Kedokteran Hewan', 'Farmasi', 'Psikologi', 'Ilmu Sosial dan Ilmu Politik', 'Hukum', 'Ekonomi dan Bisnis', 'Sains dan Teknologi', 'Kesehatan Masyarakat', 'Keperawatan', 'Perikanan dan Kelautan', 'Vokasi']
            ],
            [
                'nama_kampus' => 'Universitas Brawijaya',
                'singkatan' => 'UB',
                'kota' => 'Malang',
                'provinsi' => 'Jawa Timur',
                'deskripsi' => 'Universitas Brawijaya adalah universitas negeri yang terletak di Malang, Jawa Timur. UB memiliki berbagai fakultas unggulan dan suasana kampus yang sejuk.',
                'website' => 'https://ub.ac.id',
                'logo' => 'logos/ub.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1963,
                'jumlah_mahasiswa' => 65000,
                'fakultas' => ['Hukum', 'Ekonomi dan Bisnis', 'Ilmu Administrasi', 'Pertanian', 'Peternakan', 'Teknik', 'Kedokteran', 'Perikanan dan Ilmu Kelautan', 'MIPA', 'Teknologi Pertanian', 'ISIP', 'Ilmu Budaya', 'Kedokteran Gigi', 'Ilmu Komputer', 'Kedokteran Hewan', 'Vokasi']
            ],
            [
                'nama_kampus' => 'Universitas Diponegoro',
                'singkatan' => 'UNDIP',
                'kota' => 'Semarang',
                'provinsi' => 'Jawa Tengah',
                'deskripsi' => 'Universitas Diponegoro adalah universitas negeri yang terletak di Semarang. UNDIP memiliki kampus yang modern dan berbagai program studi yang berkualitas.',
                'website' => 'https://undip.ac.id',
                'logo' => 'logos/undip.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1957,
                'jumlah_mahasiswa' => 52000,
                'fakultas' => ['Hukum', 'Ekonomika dan Bisnis', 'Teknik', 'Kedokteran', 'Peternakan dan Pertanian', 'MIPA', 'Perikanan dan Ilmu Kelautan', 'FISIP', 'Psikologi', 'FIB', 'Kesehatan Masyarakat', 'Sekolah Vokasi']
            ],
            [
                'nama_kampus' => 'Universitas Sebelas Maret',
                'singkatan' => 'UNS',
                'kota' => 'Surakarta',
                'provinsi' => 'Jawa Tengah',
                'deskripsi' => 'Universitas Sebelas Maret adalah universitas negeri yang terletak di Surakarta (Solo). UNS memiliki berbagai fakultas dan program studi yang berkualitas.',
                'website' => 'https://uns.ac.id',
                'logo' => 'logos/uns.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1976,
                'jumlah_mahasiswa' => 36000,
                'fakultas' => ['Hukum', 'FISIP', 'Keguruan dan Ilmu Pendidikan', 'Ekonomi dan Bisnis', 'Pertanian', 'Kedokteran', 'Teknik', 'MIPA', 'Seni Rupa dan Desain', 'Psikologi', 'Farmasi', 'Kedokteran Gigi', 'Keolahragaan', 'Vokasi']
            ],
            [
                'nama_kampus' => 'Universitas Padjadjaran',
                'singkatan' => 'UNPAD',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Universitas Padjadjaran adalah universitas negeri yang terletak di Bandung dan Sumedang. UNPAD memiliki reputasi yang baik dalam berbagai bidang ilmu.',
                'website' => 'https://unpad.ac.id',
                'logo' => 'logos/unpad.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1957,
                'jumlah_mahasiswa' => 42000,
                'fakultas' => ['Hukum', 'Ekonomi dan Bisnis', 'Kedokteran', 'MIPA', 'Pertanian', 'FISIP', 'Psikologi', 'FIB', 'Teknologi Industri Pertanian', 'Farmasi', 'Kedokteran Gigi', 'Ilmu Komunikasi', 'Keperawatan', 'Teknik Geologi', 'Perikanan dan Ilmu Kelautan']
            ],
            [
                'nama_kampus' => 'Universitas Sumatera Utara',
                'singkatan' => 'USU',
                'kota' => 'Medan',
                'provinsi' => 'Sumatera Utara',
                'deskripsi' => 'Universitas Sumatera Utara adalah universitas negeri terbesar di Sumatera yang terletak di Medan. USU memiliki berbagai fakultas dan program studi unggulan.',
                'website' => 'https://usu.ac.id',
                'logo' => 'logos/usu.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1952,
                'jumlah_mahasiswa' => 40000,
                'fakultas' => ['Kedokteran', 'Hukum', 'Pertanian', 'Teknik', 'Ekonomi dan Bisnis', 'FISIP', 'MIPA', 'Psikologi', 'FIB', 'Farmasi', 'Kedokteran Gigi', 'Kesehatan Masyarakat', 'Ilmu Komputer dan Teknologi Informasi', 'Keperawatan', 'Kehutanan']
            ],
            [
                'nama_kampus' => 'Universitas Hasanuddin',
                'singkatan' => 'UNHAS',
                'kota' => 'Makassar',
                'provinsi' => 'Sulawesi Selatan',
                'deskripsi' => 'Universitas Hasanuddin adalah universitas negeri terbesar di Indonesia Timur yang terletak di Makassar. UNHAS memiliki peran penting dalam pengembangan pendidikan di kawasan timur Indonesia.',
                'website' => 'https://unhas.ac.id',
                'logo' => 'logos/unhas.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1956,
                'jumlah_mahasiswa' => 35000,
                'fakultas' => ['Kedokteran', 'Teknik', 'Hukum', 'Ekonomi dan Bisnis', 'Pertanian', 'MIPA', 'FISIP', 'FIB', 'Peternakan', 'Kedokteran Gigi', 'Kesehatan Masyarakat', 'Farmasi', 'Kehutanan', 'Ilmu Kelautan dan Perikanan', 'Psikologi', 'Keperawatan']
            ],
            [
                'nama_kampus' => 'Universitas Andalas',
                'singkatan' => 'UNAND',
                'kota' => 'Padang',
                'provinsi' => 'Sumatera Barat',
                'deskripsi' => 'Universitas Andalas adalah universitas negeri tertua di luar Pulau Jawa yang terletak di Padang. UNAND memiliki peran penting dalam pengembangan pendidikan di Sumatera Barat.',
                'website' => 'https://unand.ac.id',
                'logo' => 'logos/unand.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1955,
                'jumlah_mahasiswa' => 28000,
                'fakultas' => ['Kedokteran', 'Teknik', 'MIPA', 'Pertanian', 'Peternakan', 'Ekonomi', 'FISIP', 'Hukum', 'FIB', 'Farmasi', 'Kedokteran Gigi', 'Kesehatan Masyarakat', 'Ilmu Budaya', 'Teknologi Informasi', 'Keperawatan']
            ],
            [
                'nama_kampus' => 'Institut Teknologi Sepuluh Nopember',
                'singkatan' => 'ITS',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'deskripsi' => 'Institut Teknologi Sepuluh Nopember adalah perguruan tinggi negeri yang fokus pada bidang teknologi dan rekayasa. ITS merupakan salah satu institut teknologi terbaik di Indonesia.',
                'website' => 'https://its.ac.id',
                'logo' => 'logos/its.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1960,
                'jumlah_mahasiswa' => 20000,
                'fakultas' => ['Teknologi Industri', 'Teknik Sipil dan Perencanaan', 'MIPA', 'Teknologi Informasi', 'Teknologi Kelautan', 'Arsitektur Desain dan Perencanaan', 'Bisnis dan Manajemen Teknologi', 'Vokasi']
            ],
            [
                'nama_kampus' => 'Universitas Negeri Jakarta',
                'singkatan' => 'UNJ',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'deskripsi' => 'Universitas Negeri Jakarta adalah universitas negeri yang fokus pada bidang pendidikan dan keguruan. UNJ memiliki peran penting dalam mencetak tenaga pendidik berkualitas.',
                'website' => 'https://unj.ac.id',
                'logo' => 'logos/unj.png',
                'akreditasi' => 'A',
                'status' => 'negeri',
                'tahun_berdiri' => 1964,
                'jumlah_mahasiswa' => 18000,
                'fakultas' => ['Ilmu Pendidikan', 'Bahasa dan Seni', 'MIPA', 'Ilmu Sosial', 'Teknik', 'Ilmu Olahraga', 'Ekonomi', 'Psikologi Pendidikan']
            ],
            [
                'nama_kampus' => 'Universitas Lampung',
                'singkatan' => 'UNILA',
                'kota' => 'Bandar Lampung',
                'provinsi' => 'Lampung',
                'deskripsi' => 'Universitas Lampung adalah universitas negeri yang terletak di Bandar Lampung. UNILA memiliki peran penting dalam pengembangan pendidikan di Provinsi Lampung.',
                'website' => 'https://unila.ac.id',
                'logo' => 'logos/unila.png',
                'akreditasi' => 'B',
                'status' => 'negeri',
                'tahun_berdiri' => 1965,
                'jumlah_mahasiswa' => 25000,
                'fakultas' => ['Ekonomi dan Bisnis', 'Hukum', 'FISIP', 'Keguruan dan Ilmu Pendidikan', 'Pertanian', 'Teknik', 'MIPA', 'Kedokteran']
            ],
            [
                'nama_kampus' => 'Universitas Bina Nusantara',
                'singkatan' => 'BINUS',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'deskripsi' => 'Universitas Bina Nusantara adalah universitas swasta yang fokus pada bidang teknologi informasi dan bisnis. BINUS dikenal sebagai universitas IT terbaik di Indonesia.',
                'website' => 'https://binus.ac.id',
                'logo' => 'logos/binus.png',
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 1996,
                'jumlah_mahasiswa' => 30000,
                'fakultas' => ['Ilmu Komputer', 'Ekonomi dan Komunikasi', 'Teknik', 'Desain', 'Humaniora', 'Bisnis dan Manajemen']
            ],
            [
                'nama_kampus' => 'Universitas Telkom',
                'singkatan' => 'Tel-U',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'deskripsi' => 'Universitas Telkom adalah universitas swasta yang fokus pada bidang teknologi, khususnya telekomunikasi dan informatika. Tel-U memiliki fasilitas modern dan kurikulum yang up-to-date.',
                'website' => 'https://telkomuniversity.ac.id',
                'logo' => 'logos/telkom.png',
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 2013,
                'jumlah_mahasiswa' => 25000,
                'fakultas' => ['Teknik Elektro', 'Rekayasa Industri', 'Informatika', 'Ekonomi dan Bisnis', 'Komunikasi dan Bisnis', 'Industri Kreatif', 'Ilmu Terapan']
            ],
            [
                'nama_kampus' => 'Universitas Trisakti',
                'singkatan' => 'USAKTI',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'deskripsi' => 'Universitas Trisakti adalah universitas swasta yang memiliki berbagai fakultas unggulan. Trisakti dikenal memiliki alumni yang sukses di berbagai bidang.',
                'website' => 'https://trisakti.ac.id',
                'logo' => 'logos/trisakti.png',
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 1965,
                'jumlah_mahasiswa' => 20000,
                'fakultas' => ['Hukum', 'Ekonomi', 'Kedokteran', 'Teknik Sipil dan Perencanaan', 'Teknologi Industri', 'Kedokteran Gigi', 'Seni Rupa dan Desain', 'Teknologi Kebumian dan Energi', 'Arsitektur Lansekap dan Teknologi Lingkungan']
            ],
            [
                'nama_kampus' => 'Universitas Tarumanagara',
                'singkatan' => 'UNTAR',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'deskripsi' => 'Universitas Tarumanagara adalah universitas swasta yang memiliki reputasi baik dalam bidang teknik dan ekonomi. UNTAR memiliki fasilitas yang lengkap dan modern.',
                'website' => 'https://untar.ac.id',
                'logo' => 'logos/untar.png',
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 1959,
                'jumlah_mahasiswa' => 15000,
                'fakultas' => ['Ekonomi', 'Hukum', 'Teknik', 'Kedokteran', 'Psikologi', 'Seni Rupa dan Desain', 'Teknologi Informasi']
            ],
            [
                'nama_kampus' => 'Universitas Katolik Indonesia Atma Jaya',
                'singkatan' => 'UNIKA Atma Jaya',
                'kota' => 'Jakarta',
                'provinsi' => 'DKI Jakarta',
                'deskripsi' => 'Universitas Katolik Indonesia Atma Jaya adalah universitas swasta katolik yang memiliki tradisi akademik yang kuat. Atma Jaya dikenal dengan kualitas pendidikannya yang baik.',
                'website' => 'https://atmajaya.ac.id',
                'logo' => 'logos/atmajaya.png',
                'akreditasi' => 'A',
                'status' => 'swasta',
                'tahun_berdiri' => 1960,
                'jumlah_mahasiswa' => 12000,
                'fakultas' => ['Ekonomi', 'Hukum', 'Teknik', 'Kedokteran dan Ilmu Kesehatan', 'Psikologi', 'Ilmu Administrasi Bisnis dan Ilmu Komunikasi', 'Teknobiologi', 'Pendidikan dan Bahasa']
            ]
        ];

        foreach ($kampuses as $kampus) {
            Kampus::create($kampus);
        }
    }
}
