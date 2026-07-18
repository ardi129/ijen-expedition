<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\HeroSlide;
use App\Models\HomeStat;
use App\Models\PackageGroup;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedHeroSlides();
        $this->seedContentBlocks();
        $this->seedPackageGroups();
        $this->seedHomeStats();
    }

    private function seedHeroSlides(): void
    {
        HeroSlide::upsert([
            [
                'title' => 'Paket Wisata Banyuwangi & Kawah Ijen',
                'subtitle' => 'Eksplorasi Keajaiban Alam',
                'description' => 'Temukan pengalaman liburan eksotis bersama kami. Private trip & open trip fleksibel sesuai kebutuhan Anda.',
                'image' => '/images/ijen_crater.png',
                'cta_text' => 'Lihat Paket Wisata',
                'cta_link' => '/packages',
                'cta_text_2' => 'Hubungi Kami',
                'cta_link_2' => '/contact',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Saksikan Blue Fire Kawah Ijen',
                'subtitle' => 'Fenomena Langka',
                'description' => 'Pendakian malam hari untuk melihat salah satu keajaiban dunia yang hanya ada dua di bumi.',
                'image' => '/images/ijen_crater.png',
                'cta_text' => 'Detail Trip Kawah Ijen',
                'cta_link' => '/packages/paket-wisata-banyuwangi-1-hari-privat-trip-kawah-ijen',
                'cta_text_2' => null,
                'cta_link_2' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Eksotisme Baluran & Pulau Tabuhan',
                'subtitle' => 'Surga Tersembunyi',
                'description' => 'Nikmati sensasi Africa van Java dan keindahan pasir putih bawah laut dalam satu paket perjalanan.',
                'image' => '/images/tabuhan_beach.png',
                'cta_text' => 'Lihat Itinerary Lengkap',
                'cta_link' => '/packages/paket-f-menjangan-tabuhan-baluran-privat-trip-1-hari',
                'cta_text_2' => null,
                'cta_link_2' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
        ], ['sort_order'], ['title', 'subtitle', 'description', 'image', 'cta_text', 'cta_link', 'cta_text_2', 'cta_link_2', 'is_active']);
    }

    private function seedContentBlocks(): void
    {
        ContentBlock::upsert([
            [
                'key' => 'destinations-section',
                'title' => 'Jelajahi Keindahan Banyuwangi',
                'subtitle' => 'Dari fenomena alam langka hingga savana ala Afrika, setiap destinasi menyimpan pesona yang siap memukau Anda.',
                'content' => null,
                'image' => null,
                'is_active' => true,
            ],
            [
                'key' => 'about-intro',
                'title' => 'Mitra Perjalanan Terpercaya Sejak 2020',
                'subtitle' => null,
                'content' => '<p>Ijen Expedition Trip berdiri pada tahun 2020 dengan misi menghadirkan pengalaman wisata Banyuwangi yang autentik, aman, dan tak terlupakan. Berawal dari kecintaan kami terhadap alam dan budaya lokal, kami tumbuh menjadi salah satu penyedia layanan tour &amp; travel terdepan di kawasan Banyuwangi.</p><p>Lebih dari 5.000 wisatawan telah mempercayakan perjalanan mereka kepada kami. Dari solo traveler, pasangan bulan madu, hingga rombongan keluarga dan corporate gathering, kami selalu berkomitmen memberikan pelayanan terbaik dengan harga yang transparan dan kompetitif.</p>',
                'image' => '/images/Ijen-expedition-logo.png',
                'is_active' => true,
            ],
            [
                'key' => 'visi',
                'title' => 'Visi Kami',
                'subtitle' => null,
                'content' => '<p>Menjadi penyedia layanan wisata terbaik dan terpercaya di Banyuwangi yang memajukan potensi pariwisata lokal dengan tetap menjaga kelestarian alam dan budaya.</p>',
                'image' => null,
                'is_active' => true,
            ],
            [
                'key' => 'misi',
                'title' => 'Misi Kami',
                'subtitle' => null,
                'content' => '<ul><li>Memberikan pelayanan prima dan profesional kepada setiap pelanggan</li><li>Menyediakan paket wisata berkualitas dengan harga transparan dan kompetitif</li><li>Mengutamakan keamanan, kenyamanan, dan kepuasan klien</li><li>Memberdayakan masyarakat dan guide lokal untuk kesejahteraan bersama</li></ul>',
                'image' => null,
                'is_active' => true,
            ],
            [
                'key' => 'cta-banner',
                'title' => 'Rencanakan Petualangan Eksklusif Anda',
                'subtitle' => null,
                'content' => 'Tidak menemukan paket yang sesuai? Diskusikan kebutuhan perjalanan spesifik Anda, dan tim ahli kami akan merancang itinerary khusus untuk mewujudkan pengalaman liburan yang tak terlupakan.',
                'image' => '/images/banyuwangi_hero.png',
                'is_active' => true,
            ],
            [
                'key' => 'articles-section',
                'title' => 'Panduan & Informasi Wisata',
                'subtitle' => null,
                'content' => null,
                'image' => null,
                'is_active' => true,
            ],
            [
                'key' => 'terms-conditions',
                'title' => 'Syarat & Ketentuan',
                'subtitle' => null,
                'content' => '<h3>1. Pendaftaran dan Pemesanan</h3><p>Pendaftaran paket wisata dapat dilakukan melalui website, WhatsApp, atau email resmi kami. Pemesanan dianggap sah setelah ada konfirmasi pembayaran Down Payment (DP) atau pelunasan.</p><h3>2. Pembayaran</h3><p>Pembayaran DP minimal 30% dari total biaya keseluruhan (atau sesuai kesepakatan) dibayarkan maksimal H-7 sebelum hari keberangkatan. Pelunasan dapat dibayarkan H-1 atau saat meeting point sebelum keberangkatan.</p><h3>3. Pembatalan dan Pengembalian Dana</h3><p>Pembatalan yang dilakukan oleh peserta akan mengakibatkan DP hangus. Namun, pemindahan tanggal (reschedule) diperbolehkan dengan pemberitahuan minimal H-7, tergantung ketersediaan.</p><p>Jika terjadi pembatalan dari pihak penyelenggara karena force majeure (bencana alam, kondisi cuaca ekstrem, dll), maka dana akan dikembalikan sepenuhnya (100%).</p><h3>4. Tanggung Jawab dan Keamanan</h3><p>Peserta wajib mematuhi instruksi dari guide/pemandu wisata demi keselamatan bersama. Pihak penyelenggara tidak bertanggung jawab atas kehilangan barang berharga pribadi peserta selama trip.</p>',
                'image' => null,
                'is_active' => true,
            ],
            [
                'key' => 'privacy-policy',
                'title' => 'Kebijakan Privasi',
                'subtitle' => null,
                'content' => '<p>Ijen Expedition Trip ("kami", "milik kami", atau "kita") menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan kepada kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat Anda menggunakan layanan kami.</p><h3>1. Informasi yang Kami Kumpulkan</h3><p>Kami dapat mengumpulkan informasi identitas pribadi, seperti nama, alamat email, nomor telepon, dan informasi pembayaran, yang Anda berikan secara sukarela saat memesan paket wisata atau menghubungi kami.</p><h3>2. Penggunaan Informasi</h3><p>Informasi yang kami kumpulkan digunakan untuk memproses pemesanan Anda, berkomunikasi mengenai layanan yang Anda pesan, dan untuk tujuan administratif lainnya.</p><h3>3. Keamanan Data</h3><p>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi data pribadi Anda dari akses yang tidak sah, pengubahan, pengungkapan, atau penghancuran.</p><h3>4. Berbagi Informasi dengan Pihak Ketiga</h3><p>Kami tidak akan menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga. Kami hanya dapat membagikan informasi Anda dengan mitra terpercaya (seperti penyedia transportasi atau penginapan) yang membantu kami dalam menyelenggarakan trip Anda.</p><h3>5. Perubahan Kebijakan Privasi</h3><p>Kami berhak untuk mengubah Kebijakan Privasi ini kapan saja. Setiap perubahan akan diumumkan di halaman ini.</p>',
                'image' => null,
                'is_active' => true,
            ],
        ], ['key'], ['title', 'subtitle', 'content', 'image', 'is_active']);
    }

    private function seedPackageGroups(): void
    {
        PackageGroup::upsert([
            [
                'name' => 'Paket 3 Hari 2 Malam',
                'description' => 'Liburan panjang menjelajahi Banyuwangi lebih dalam',
                'filter_type' => 'duration',
                'filter_value' => '3',
                'exclude_filter_type' => 'category',
                'exclude_filter_value' => 'honeymoon',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Paket 2 Hari 1 Malam',
                'description' => 'Akhir pekan seru tanpa perlu cuti panjang',
                'filter_type' => 'duration',
                'filter_value' => '2',
                'exclude_filter_type' => null,
                'exclude_filter_value' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'One Day Trip Privat',
                'description' => 'Eksplorasi satu hari penuh, privat tanpa digabung',
                'filter_type' => 'duration',
                'filter_value' => '1',
                'exclude_filter_type' => 'category',
                'exclude_filter_value' => 'open-trip',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Open Trip',
                'description' => 'Trip hemat dengan teman baru, berangkat setiap hari',
                'filter_type' => 'category',
                'filter_value' => 'open-trip',
                'exclude_filter_type' => null,
                'exclude_filter_value' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Paket Honeymoon',
                'description' => 'Momen romantis untuk pasangan',
                'filter_type' => 'category',
                'filter_value' => 'honeymoon',
                'exclude_filter_type' => null,
                'exclude_filter_value' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ], ['sort_order'], ['name', 'description', 'filter_type', 'filter_value', 'exclude_filter_type', 'exclude_filter_value', 'is_active']);
    }

    private function seedHomeStats(): void
    {
        HomeStat::upsert([
            ['value' => '5+', 'label' => 'Tahun Pengalaman', 'color' => 'primary', 'sort_order' => 0, 'is_active' => true],
            ['value' => '5.000+', 'label' => 'Wisatawan Puas', 'color' => 'accent', 'sort_order' => 1, 'is_active' => true],
            ['value' => '10+', 'label' => 'Destinasi Unggulan', 'color' => 'primary', 'sort_order' => 2, 'is_active' => true],
            ['value' => '100%', 'label' => 'Layanan Profesional', 'color' => 'primary', 'sort_order' => 3, 'is_active' => true],
        ], ['sort_order'], ['value', 'label', 'color', 'is_active']);
    }
}
