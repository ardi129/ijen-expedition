<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\TourPackage;
use Illuminate\Database\Seeder;

class IjenSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Article::truncate();
        TourPackage::truncate();
        Faq::truncate();
        Category::truncate();
        Destination::truncate();
        \DB::table('package_destination')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $catPrivate = Category::create([
            'name' => 'Privat Trip',
            'slug' => 'privat-trip',
            'description' => 'Paket wisata privat untuk perjalanan yang lebih personal dan eksklusif.',
            'sort_order' => 1,
        ]);

        $catOpen = Category::create([
            'name' => 'Open Trip',
            'slug' => 'open-trip',
            'description' => 'Paket wisata gabungan yang hemat dan berkesempatan mendapat teman baru.',
            'sort_order' => 2,
        ]);

        $catHoneymoon = Category::create([
            'name' => 'Honeymoon',
            'slug' => 'honeymoon',
            'description' => 'Paket wisata romantis yang dirancang khusus untuk pasangan bulan madu.',
            'sort_order' => 3,
        ]);

        $destIjen = Destination::create([
            'name' => 'Kawah Ijen',
            'slug' => 'kawah-ijen',
            'description' => 'Kawah vulkanik yang terkenal dengan fenomena api birunya yang langka di dunia.',
            'content' => "Kawah Ijen adalah salah satu destinasi paling ikonik di Banyuwangi, bahkan di Indonesia. Terletak di ketinggian 2.386 meter di atas permukaan laut, kawah ini menyimpan fenomena alam yang hanya ada dua di dunia: Blue Fire atau api biru.\n\nFenomena Blue Fire\nBlue Fire terjadi akibat gas belerang yang menyala pada suhu tinggi, menghasilkan cahaya biru elektrik yang menerangi dinding kawah saat malam hari. Fenomena ini hanya bisa disaksikan di Kawah Ijen dan satu tempat lain di Islandia. Untuk melihatnya, pendakian dimulai sekitar pukul 01.00 – 02.00 dini hari.\n\nDanau Kawah Asam\nKawah Ijen memiliki danau kawah terbesar di dunia dengan air yang sangat asam (pH mendekati 0). Air danau berwarna hijau toska yang kontras dengan tebing-tebing curam di sekelilingnya. Saat matahari terbit, pemandangan kabut yang menyelimuti permukaan danau menciptakan panorama yang sangat fotogenik.\n\nPara Penambang Belerang\nSalah satu pemandangan yang paling mengesankan di Kawah Ijen adalah para penambang belerang tradisional yang mengangkut belerang dalam keranjang di pundak mereka. Mereka naik-turun kawah dengan beban mencapai 70–90 kg per angkutan. Dedikasi mereka menjadi daya tarik tersendiri bagi wisatawan yang ingin melihat sisi heroik kehidupan masyarakat sekitar.\n\nTips Berwisata ke Kawah Ijen:\n- Gunakan masker gas atau masker N95 untuk melindungi pernapasan dari uap belerang\n- Kenakan jaket tebal karena suhu bisa mencapai 5–10°C di puncak\n- Gunakan sepatu trekking yang nyaman dan anti-selip\n- Bawa sentral atau headlamp untuk pendakian dini hari\n- Booking guide lokal untuk pengalaman yang lebih aman dan informatif\n\nKawah Ijen adalah destinasi wajib bagi para pecinta alam, fotografer, dan siapapun yang ingin menyaksikan keajaiban dunia dengan mata kepala sendiri.",
            'location' => 'Banyuwangi',
            'image' => '/images/ijen_crater.png',
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        $destBaluran = Destination::create([
            'name' => 'Taman Nasional Baluran',
            'slug' => 'taman-nasional-baluran',
            'description' => 'Sering dijuluki Africa van Java, terkenal dengan savana Bekol yang luas.',
            'content' => "Taman Nasional Baluran sering disebut sebagai \"Africa van Java\" karena hamparan savana luasnya yang mirip dengan lanskap Afrika. Terletak di perbatasan Banyuwangi dan Situbondo, taman nasional ini menawarkan pengalaman safari yang unik di Pulau Jawa.\n\nSavana Bekol\nSavana Bekol adalah area paling populer di Baluran. Hamparan rumput hijau yang membentang luas dengan latar belakang Gunung Baluran yang menjulang menciptakan pemandangan yang memukau. Di sini, Anda bisa melihat banteng liar, kerbau, rusa, merak, dan berbagai satwa lainnya yang berkeliaran bebas.\n\nPantai Bama\nTidak hanya savana, Baluran juga memiliki pantai yang indah: Pantai Bama. Pantai dengan pasir putih dan air laut yang tenang ini cocok untuk bersantai setelah menjelajahi savana. Anda juga bisa snorkeling di sekitar pantai untuk melihat biota laut.\n\nHutan Mangrove dan Hujan Tropis\nBaluran memiliki ekosistem yang beragam: dari hutan mangrove di pesisir hingga hutan hujan tropis dan savana yang kering. Keberagaman ini membuat Baluran menjadi rumah bagi lebih dari 444 jenis tumbuhan dan 200 jenis satwa.\n\nAktivitas yang Bisa Dilakukan:\n- Safari melihat satwa liar di Savana Bekol\n- Trekking ke puncak Gunung Baluran (1.247 mdpl)\n- Bersantai dan snorkeling di Pantai Bama\n- Fotografi satwa dan lanskap\n- Camping di area yang telah ditentukan\n\nTips Berwisata:\n- Waktu terbaik berkunjung adalah musim kemarau (April–Oktober)\n- Bawa teropong untuk melihat satwa liar dari jarak jauh\n- Gunakan kendaraan 4x4 untuk menjelajahi area yang lebih luas\n- Sewa guide lokal untuk pengalaman yang lebih maksimal",
            'location' => 'Situbondo',
            'image' => '/images/baluran_savannah.png',
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        $destMenjangan = Destination::create([
            'name' => 'Pulau Menjangan',
            'slug' => 'pulau-menjangan',
            'description' => 'Surga bawah laut yang terkenal dengan terumbu karang yang indah.',
            'content' => "Pulau Menjangan adalah salah satu surga snorkeling dan diving terbaik di Indonesia. Terletak di sisi barat Pulau Bali, tepatnya di kawasan Taman Nasional Bali Barat, pulau kecil ini menawarkan keindahan bawah laut yang luar biasa.\n\nKeindahan Bawah Laut\nPerairan Pulau Menjangan terkenal dengan dinding terumbu karang (coral wall) yang vertikal dan menakjubkan. Air laut yang jernih dengan visibilitas mencapai 20–30 meter memungkinkan Anda melihat terumbu karang berwarna-warni, ikan tropis, hingga penyu laut dan kadang-kadang manta ray. Spot diving dan snorkeling di sini termasuk yang terbaik di dunia.\n\nEkosistem Pulau\nPulau Menjangan tidak berpenghuni, menjadikannya tempat yang tenang dan alami. Pulau ini ditumbuhi hutan tropis yang lebat dan dikelilingi oleh pantai berpasir putih. Di atas pulau, Anda bisa melakukan trekking pendek untuk melihat panorama laut lepas dari tebing-tebing karang.\n\nSejarah dan Mitos\nNama Menjangan berasal dari kata \"menjangan\" yang berarti rusa. Konon, dahulu kala rusa-rusa berenang ke pulau ini untuk merumput. Sisa-sisa pura Hindu juga dapat ditemukan di pulau ini, menunjukkan bahwa pulau ini memiliki nilai spiritual bagi masyarakat Bali.\n\nAktivitas:\n- Snorkeling di spot-spot terbaik (cocok untuk pemula maupun ahli)\n- Diving untuk melihat dinding karang vertikal\n- Foto bawah laut menggunakan underwater camera\n- Trekking keliling pulau\n- Menikmati panorama sunset dari perahu",
            'location' => 'Bali Barat',
            'image' => '/images/tabuhan_beach.png',
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        $destDjawatan = Destination::create([
            'name' => 'De Djawatan',
            'slug' => 'de-djawatan',
            'description' => 'Hutan trembesi raksasa yang suasananya mirip hutan di film Lord of the Rings.',
            'content' => "De Djawatan adalah salah satu destinasi paling fotogenik di Banyuwangi. Hutan trembesi (albasia) yang ditanam sejak zaman kolonial Belanda ini menciptakan suasana mistis dan magis yang sulit ditemukan di tempat lain.\n\nHutan Trembesi Raksasa\nPohon-pohon trembesi di De Djawatan berusia puluhan tahun dengan cabang-cabang yang menjulang dan meliuk-liuk membentuk kanopi alami. Di bawahnya, tumbuhan paku dan lumut hijau menutupi lantai hutan, menciptakan kontras warna yang indah. Saat sinar matahari menembus celah-celah dedaunan, efek cahaya yang tercipta sangat dramatis dan sempurna untuk fotografi.\n\nSpot Favorit Fotografer\nTidak heran jika De Djawatan menjadi lokasi favorit para fotografer, baik profesional maupun amatir. Suasananya yang seperti hutan dalam film Lord of the Rings atau hutan ajaib Fairy Tail membuat setiap sudutnya layak diabadikan. Banyak prewedding, foto model, hingga konten kreator yang menjadikan De Djawatan sebagai latar utama.\n\nFasilitas dan Aktivitas:\n- Berjalan kaki menyusuri jalan setapak di antara pepohonan\n- Berfoto di spot-spot yang telah ditentukan\n- Menikmati udara segar dan teduh\n- Area parkir yang luas\n- Warung-warung kecil di sekitar destinasi\n\nTips:\n- Datang pagi hari (sekitar pukul 07.00–09.00) untuk menikmati cahaya matahari yang indah\n- Gunakan pakaian berwarna terang agar kontras dengan latar hutan yang hijau\n- Jangan lupa membawa kamera atau smartphone dengan kualitas foto yang baik\n- De Djawatan buka setiap hari, cocok untuk semua kalangan",
            'location' => 'Banyuwangi',
            'image' => '/images/djawatan_forest.png',
            'is_featured' => true,
            'sort_order' => 4,
        ]);

        $destPulauMerah = Destination::create([
            'name' => 'Pulau Merah',
            'slug' => 'pulau-merah',
            'description' => 'Pantai dengan bukit hijau di tengahnya yang ikonik, ombak cocok untuk surfing.',
            'content' => "Pulau Merah (Red Island) adalah salah satu destinasi pantai paling populer di Banyuwangi. Namanya berasal dari bukit kecil berwarna hijau yang berada di tengah pantai, yang konon jika dilihat dari kejauhan saat senja tampak berwarna kemerahan.\n\nPesona Pantai\nPantai Pulau Merah memiliki pasir yang lembut dan air laut yang jernih dengan gradasi biru kehijauan. Ombaknya yang cukup besar menjadikannya surga bagi para peselancar, baik pemula maupun profesional. Terdapat beberapa spot surfing dengan tingkat kesulitan yang bervariasi.\n\nBukit Pulau Merah\nSalah satu daya tarik utama adalah bukit kecil yang bisa Anda daki untuk menikmati pemandangan pantai dari ketinggian. Dari atas bukit, Anda bisa melihat hamparan pantai yang panjang, ombak yang menggulung, dan laut lepas yang membentang hingga ke cakrawala. Momen matahari terbenam dari atas bukit ini sungguh luar biasa.\n\nFlora dan Fauna\nDi sekitar pulau, Anda bisa menemukan berbagai jenis burung laut dan vegetasi pantai yang khas. Pada musim-musim tertentu, penyu laut juga naik ke pantai untuk bertelur, menjadikannya tempat yang penting untuk konservasi penyu.\n\nAktivitas:\n- Surfing (tersedia papan surfing untuk disewa)\n- Berenang dan bermain air\n- Mendaki bukit Pulau Merah\n- Berjemur di pasir putih\n- Fotografi pemandangan dan sunset\n- Menikmati kuliner seafood di warung sekitar\n\nTips:\n- Waktu terbaik untuk surfing adalah musim kemarau (April–Oktober)\n- Hati-hati dengan ombak yang cukup besar bagi perenang pemula\n- Bawa alas kaki untuk mendaki bukit (batu karang bisa tajam)\n- Tersedia penginapan sederhana di sekitar pantai jika ingin menginap",
            'location' => 'Banyuwangi',
            'image' => '/images/ijen_crater.png',
            'is_featured' => true,
            'sort_order' => 5,
        ]);

        $pkg1 = TourPackage::create([
            'category_id' => $catPrivate->id,
            'title' => 'One Day Trip Banyuwangi | Pulau Tabuhan, Menjangan & Baluran',
            'slug' => 'one-day-trip-banyuwangi-tabuhan-menjangan-baluran',
            'short_description' => 'Nikmati sensasi liburan sehari penuh menyaksikan sunrise di Pulau Tabuhan, snorkeling di Pulau Menjangan, dan menjelajahi savana Baluran.',
            'description' => "Nikmati sensasi liburan sehari penuh yang berbeda dengan One Day Trip Banyuwangi. Paket ini bersifat private trip, artinya perjalanan hanya untuk kamu dan rombonganmu tanpa digabung peserta lain.\n\nKamu akan diajak:\n- Menyaksikan sunrise di Pulau Tabuhan\n- Snorkeling di Pulau Menjangan – Taman Nasional Bali Barat\n- Menjelajahi Taman Nasional Baluran, savana terluas di Pulau Jawa dengan satwa liar yang hidup bebas\n\nSudah termasuk Guide profesional yang akan mendampingi, jadi kamu tinggal menikmati liburan tanpa ribet mencari spot foto terbaik.\n\nCatatan Penting:\n- Trip tersedia setiap hari\n- Pesan jauh-jauh hari karena kuota perahu ke Tabuhan & Menjangan terbatas\n- Destinasi: Pulau Tabuhan, Pulau Menjangan, Taman Nasional Baluran\n\nMeeting Point:\nPenjemputan di area Banyuwangi Kota: Hotel, Stasiun, Terminal\n\nSyarat & Ketentuan:\n- Membayar DP 30% maksimal 2 minggu sebelum keberangkatan (non-refundable jika pembatalan dari peserta)\n- Pelunasan dilakukan di hari pertama trip\n- Usia peserta 1-60 tahun, sehat jasmani (tidak memiliki riwayat jantung/asma)\n- Tidak ada kompensasi untuk destinasi yang tidak dapat dikunjungi karena cuaca buruk atau penutupan area\n- Peserta dianggap setuju dengan syarat & ketentuan setelah melakukan booking\n\nBarang Wajib Dibawa:\n- Alat snorkeling pribadi (jika ada)\n- Kamera underwater (jika ada)\n- Topi, kacamata hitam, sunblock\n- Sandal, handuk, baju ganti\n- Obat-obatan pribadi",
            'duration_days' => 1,
            'duration_nights' => 0,
            'price' => 2170000,
            'price_note' => 'Harga per orang (2 orang): Rp 2.170.000 | Harga bervariasi sesuai jumlah peserta',
            'image' => '/images/tabuhan_beach.png',
            'highlights' => [
                'Sunrise di Pulau Tabuhan dengan pasir putih dan air jernih',
                'Snorkeling di Pulau Menjangan – Taman Nasional Bali Barat',
                'Menjelajahi Savana Bekol di TN Baluran (Africa van Java)',
                'Dokumentasi underwater menggunakan GoPro',
                'Private trip, hanya kamu dan rombonganmu',
                'Guide profesional berpengalaman',
            ],
            'itinerary' => [
                ['time' => '04:00', 'activity' => 'Penjemputan di Hotel atau Stasiun area Banyuwangi Kota'],
                ['time' => '04:15', 'activity' => 'Menuju Pantai Grand Watu Dodol'],
                ['time' => '04:45', 'activity' => 'Tiba di Grand Watu Dodol dan menyeberang ke Pulau Tabuhan'],
                ['time' => '05:30', 'activity' => 'Tiba di Pulau Tabuhan – menikmati sunrise, berkeliling pulau, dan foto-foto di pasir putih dengan air laut yang jernih'],
                ['time' => '07:00', 'activity' => 'Berangkat menuju Pulau Menjangan'],
                ['time' => '07:30', 'activity' => 'Tiba di Pulau Menjangan'],
                ['time' => '07:45', 'activity' => 'Agenda bebas: foto-foto di dermaga atau pantai'],
                ['time' => '08:30', 'activity' => 'Snorkeling di spot pertama – eksplorasi keindahan bawah laut Taman Nasional Bali Barat yang kaya biota laut'],
                ['time' => '09:30', 'activity' => 'Snorkeling di spot kedua'],
                ['time' => '10:30', 'activity' => 'Makan siang (lunch box)'],
                ['time' => '11:00', 'activity' => 'Kembali ke Grand Watu Dodol'],
                ['time' => '11:30', 'activity' => 'Tiba di Grand Watu Dodol'],
                ['time' => '12:00', 'activity' => 'Mandi/bilas dan istirahat sejenak'],
                ['time' => '12:30', 'activity' => 'Perjalanan menuju Taman Nasional Baluran'],
                ['time' => '13:30', 'activity' => 'Tiba di Baluran – menikmati savana Bekol, Pantai Bama, dan trekking Hutan Mangrove'],
                ['time' => '16:00', 'activity' => 'Kembali ke Banyuwangi Kota'],
                ['time' => '17:00', 'activity' => 'Drop off di hotel/stasiun – trip selesai'],
            ],
            'includes' => [
                'Guide profesional',
                'Dokumentasi underwater (GoPro)',
                'Mobil selama trip (1-4 pax Avanza/Xenia, 5-6 pax Innova, 7-12 pax Hiace/Elf)',
                'Driver & BBM',
                'Perahu ke Pulau Tabuhan dan Menjangan',
                'Pemandu snorkeling',
                'Alat snorkeling (life jacket & goggles/mask)',
                'Asuransi laut',
                'Izin snorkeling',
                'Makan siang (lunch box)',
                'Semua tiket masuk',
                'Air mineral',
            ],
            'excludes' => [
                'Drone opsional (Rp 750.000/hari)',
                'Photografer opsional (Rp 600.000/hari)',
                'Tiket WNA / Foreign Tourist Ticket',
                'Kaki katak/fin',
                'Tiket pesawat/kereta',
                'Asuransi perjalanan',
                'Pengeluaran pribadi',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
        ]);
        $pkg1->destinations()->attach([$destMenjangan->id, $destBaluran->id]);

        $pkg2 = TourPackage::create([
            'category_id' => $catPrivate->id,
            'title' => 'Privat Trip Kawah Ijen | Pendakian Blue Fire & Sunrise',
            'slug' => 'privat-trip-kawah-ijen-blue-fire-sunrise',
            'short_description' => 'Pendakian eksklusif dini hari menyaksikan fenomena Blue Fire langka dan sunrise spektakuler di puncak Kawah Ijen.',
            'description' => "Rasakan pengalaman tak terlupakan mendaki Gunung Ijen pada dini hari dalam format private trip yang eksklusif hanya untuk kamu dan rombonganmu. Tidak perlu berbagi transportasi atau guide dengan peserta lain.\n\nKamu akan diajak:\n- Menyaksikan fenomena Blue Fire yang hanya ada 2 di dunia\n- Melihat Danau Kawah Ijen, danau asam terbesar di dunia dengan gradasi warna toska yang memukau\n- Berfoto di sunrise point dengan latar puncak gunung dan kabut pagi\n- Berinteraksi dengan para penambang belerang tradisional\n\nPaket ini cocok untuk fotografer, pencinta alam, dan siapa pun yang ingin merasakan petualangan seru di Banyuwangi.\n\nCatatan Penting:\n- Trip tersedia setiap hari\n- Pendakian dimulai pukul 01.00 dini hari\n- Waktu terbaik musim kemarau (April-Oktober)\n- Destinasi: Kawah Ijen, Banyuwangi\n\nMeeting Point:\nPenjemputan gratis di area Banyuwangi Kota: Hotel, Stasiun, Terminal, Bandara\n\nSyarat & Ketentuan:\n- Membayar DP 30% maksimal 2 minggu sebelum keberangkatan (non-refundable)\n- Pelunasan dilakukan di hari pertama trip\n- Usia peserta 7-60 tahun, sehat jasmani\n- Tidak ada kompensasi jika Blue Fire tidak terlihat karena cuaca\n- Peserta dianggap setuju dengan syarat & ketentuan setelah melakukan booking\n\nBarang Wajib Dibawa:\n- Jaket tebal (suhu puncak 5-10°C)\n- Sepatu trekking\n- Headlamp/senter\n- Masker atau respirator\n- Air minum minimal 1,5 liter\n- Camilan ringan",
            'duration_days' => 1,
            'duration_nights' => 0,
            'price' => 340200,
            'price_note' => 'Harga per orang, minimal 2 orang',
            'image' => '/images/ijen_crater.png',
            'highlights' => [
                'Fenomena Blue Fire langka (hanya 2 di dunia)',
                'Danau Kawah Ijen – danau asam terbesar di dunia',
                'Sunrise point dengan panorama pegunungan',
                'Private trip eksklusif tanpa gabung peserta lain',
                'Guide lokal profesional & berpengalaman',
                'Penjemputan gratis area Banyuwangi',
            ],
            'itinerary' => [
                ['time' => '00:00', 'activity' => 'Penjemputan di Hotel/Stasiun area Banyuwangi Kota'],
                ['time' => '00:30', 'activity' => 'Perjalanan menuju Pos Paltuding (sekitar 1-1,5 jam)'],
                ['time' => '02:00', 'activity' => 'Tiba di Pos Paltuding, registrasi & persiapan pendakian'],
                ['time' => '02:15', 'activity' => 'Mulai pendakian menuju puncak Kawah Ijen'],
                ['time' => '04:00', 'activity' => 'Tiba di puncak – menyaksikan fenomena Blue Fire'],
                ['time' => '05:00', 'activity' => 'Eksplorasi kawah & foto-foto di sekitar danau'],
                ['time' => '06:00', 'activity' => 'Menikmati sunrise dari puncak Kawah Ijen'],
                ['time' => '06:30', 'activity' => 'Mulai turun kembali ke Pos Paltuding'],
                ['time' => '08:00', 'activity' => 'Tiba di Pos Paltuding, istirahat sejenak'],
                ['time' => '08:30', 'activity' => 'Perjalanan kembali ke Banyuwangi'],
                ['time' => '09:30', 'activity' => 'Drop off di hotel/stasiun – trip selesai'],
            ],
            'includes' => [
                'Transportasi AC (1-4 pax Avanza/Xenia, 5-6 pax Innova)',
                'Driver & BBM',
                'Guide lokal profesional',
                'Tiket masuk Kawah Ijen',
                'Air mineral',
                'Masker gas (jika tersedia)',
                'Asuransi pendakian',
            ],
            'excludes' => [
                'Tiket WNA / Foreign Tourist Ticket',
                'Sewa jaket (Rp 50.000)',
                'Sewa headlamp (Rp 30.000)',
                'Sewa sepatu trekking (Rp 50.000)',
                'Tiket pesawat/kereta',
                'Asuransi perjalanan',
                'Pengeluaran pribadi',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
        ]);
        $pkg2->destinations()->attach([$destIjen->id]);

        $pkg3 = TourPackage::create([
            'category_id' => $catOpen->id,
            'title' => 'Open Trip Kawah Ijen Berangkat Setiap Hari',
            'slug' => 'open-trip-kawah-ijen-berangkat-setiap-hari',
            'short_description' => 'Trip gabungan mendaki Kawah Ijen dengan harga hemat, berangkat setiap hari tanpa minimum kuota.',
            'description' => "Bagi Anda yang berlibur sendiri, bersama teman, atau dalam grup kecil, Open Trip Kawah Ijen adalah pilihan paling hemat dan praktis. Berangkat setiap hari tanpa kuota minimum, nikmati pesona Blue Fire dan Sunrise Ijen dengan harga yang sangat terjangkau.\n\nKamu akan bergabung dengan peserta lain dalam satu rombongan, berbagi transportasi dan pemandu, sehingga biaya per orang menjadi lebih ringan. Cocok untuk backpacker, solo traveler, atau siapa pun yang ingin mendaki Kawah Ijen dengan budget terbatas.\n\nApa yang akan kamu alami:\n- Trekking malam menuju puncak Kawah Ijen bersama rombongan\n- Menyaksikan fenomena Blue Fire yang langka\n- Berfoto di tepi Danau Kawah Ijen berlatar sunrise\n- Pengalaman seru bertemu teman baru sesama pencinta alam\n\nCatatan Penting:\n- Berangkat setiap hari, minimal 1 orang sudah bisa berangkat\n- Pendakian dimulai pukul 01.00 dini hari\n- Destinasi: Kawah Ijen, Banyuwangi\n\nMeeting Point:\nArea Banyuwangi Kota (terminal, hotel area kota, stasiun)\n\nBarang Wajib Dibawa:\n- Jaket tebal\n- Sepatu trekking\n- Headlamp/senter\n- Masker\n- Air minum & camilan",
            'duration_days' => 1,
            'duration_nights' => 0,
            'price' => 225000,
            'price_note' => 'Harga per orang, berangkat setiap hari minimal 1 orang',
            'image' => '/images/ijen_crater.png',
            'highlights' => [
                'Blue Fire Kawah Ijen',
                'Harga hemat & terjangkau',
                'Berangkat setiap hari tanpa minimum kuota',
                'Trekking seru bersama rombongan',
                'Cocok untuk solo traveler & backpacker',
                'Penjemputan area Banyuwangi Kota',
            ],
            'itinerary' => [
                ['time' => '23:00', 'activity' => 'Meeting point di area Banyuwangi Kota'],
                ['time' => '23:30', 'activity' => 'Perjalanan bersama (sharing transport) ke Paltuding'],
                ['time' => '01:00', 'activity' => 'Tiba di Pos Paltuding, registrasi & briefing singkat'],
                ['time' => '01:30', 'activity' => 'Mulai trekking menuju Kawah Ijen bersama rombongan'],
                ['time' => '04:00', 'activity' => 'Tiba di puncak – menyaksikan Blue Fire'],
                ['time' => '05:00', 'activity' => 'Eksplorasi kawah & menikmati sunrise'],
                ['time' => '06:30', 'activity' => 'Perjalanan turun kembali ke Pos Paltuding'],
                ['time' => '08:00', 'activity' => 'Tiba di Paltuding, perjalanan kembali ke Banyuwangi'],
                ['time' => '09:30', 'activity' => 'Drop off di meeting point – trip selesai'],
            ],
            'includes' => [
                'Transportasi AC (sharing dengan peserta lain)',
                'Driver & BBM',
                'Guide lokal',
                'Tiket masuk Kawah Ijen',
                'Air mineral',
            ],
            'excludes' => [
                'Sewa jaket, headlamp, sepatu trekking',
                'Masker gas',
                'Tiket WNA',
                'Tiket pesawat/kereta',
                'Asuransi perjalanan',
                'Pengeluaran pribadi',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
        ]);
        $pkg3->destinations()->attach([$destIjen->id]);

        $pkg4 = TourPackage::create([
            'category_id' => $catHoneymoon->id,
            'title' => 'Paket Honeymoon Banyuwangi 3 Hari 2 Malam | Opsi 1',
            'slug' => 'paket-honeymoon-banyuwangi-3-hari-2-malam-opsi-1',
            'short_description' => 'Perjalanan bulan madu romantis 3 hari 2 malam mengunjungi destinasi terbaik Banyuwangi dengan fasilitas premium.',
            'description' => "Rayakan momen spesial bulan madu Anda di Banyuwangi dengan paket honeymoon eksklusif selama 3 hari 2 malam. Kami menyediakan layanan privat, penginapan romantis, dan itinerary santai yang dirancang khusus untuk pasangan.\n\nYang akan Anda nikmati:\n- Menginap di hotel romantis dengan view laut atau pegunungan\n- Eksplorasi Hutan De Djawatan yang magis bak negeri dongeng\n- Snorkeling di Pulau Tabuhan & Bangsring Underwater\n- Safari di Taman Nasional Baluran (Africa van Java)\n- Trekking Kawah Ijen menyaksikan Blue Fire & Sunrise\n- Romantic dinner di restoran tepi pantai\n\nCatatan Penting:\n- Paket privat untuk 2 orang (pasangan)\n- Itinerary fleksibel dan dapat disesuaikan\n- Destinasi: Kawah Ijen, De Djawatan, Pulau Tabuhan, Bangsring, Baluran\n\nMeeting Point:\nPenjemputan gratis di Bandara/Stasiun/Hotel area Banyuwangi\n\nSyarat & Ketentuan:\n- DP 30% saat booking, pelunasan H-7\n- Pembatalan H-14 dikenakan biaya 50%\n- Harga sudah termasuk hotel dan seluruh aktivitas",
            'duration_days' => 3,
            'duration_nights' => 2,
            'price' => 6150000,
            'price_note' => 'Harga per pasangan, termasuk hotel 2 malam',
            'image' => '/images/djawatan_forest.png',
            'highlights' => [
                'Hotel 2 malam dengan view romantis',
                'Romantic dinner di restoran tepi pantai',
                'Eksplorasi De Djawatan Forest',
                'Snorkeling Pulau Tabuhan & Bangsring Underwater',
                'Safari Taman Nasional Baluran',
                'Trekking Kawah Ijen & Blue Fire',
                'Private trip eksklusif untuk pasangan',
            ],
            'itinerary' => [
                ['time' => 'Hari 1 - 08:00', 'activity' => 'Penjemputan di Bandara/Stasiun Banyuwangi'],
                ['time' => 'Hari 1 - 09:00', 'activity' => 'Check-in hotel & persiapan'],
                ['time' => 'Hari 1 - 10:00', 'activity' => 'Eksplorasi Hutan De Djawatan yang magis & foto romantis'],
                ['time' => 'Hari 1 - 12:00', 'activity' => 'Makan siang di restoran lokal'],
                ['time' => 'Hari 1 - 13:30', 'activity' => 'Kunjungan ke Green Island & Pulau Bedil'],
                ['time' => 'Hari 1 - 16:00', 'activity' => 'Menikmati sunset di Pantai Pulau Merah'],
                ['time' => 'Hari 1 - 19:00', 'activity' => 'Romantic dinner di restoran tepi pantai'],
                ['time' => 'Hari 2 - 07:00', 'activity' => 'Sarapan di hotel'],
                ['time' => 'Hari 2 - 08:00', 'activity' => 'Snorkeling di Pulau Tabuhan & Bangsring Underwater'],
                ['time' => 'Hari 2 - 12:00', 'activity' => 'Makan siang seafood segar'],
                ['time' => 'Hari 2 - 13:30', 'activity' => 'Safari di Taman Nasional Baluran (Savana Bekol, Pantai Bama)'],
                ['time' => 'Hari 2 - 17:00', 'activity' => 'Kembali ke hotel, free time'],
                ['time' => 'Hari 3 - 00:30', 'activity' => 'Persiapan pendakian Kawah Ijen'],
                ['time' => 'Hari 3 - 01:00', 'activity' => 'Mulai trekking menuju puncak Kawah Ijen'],
                ['time' => 'Hari 3 - 04:00', 'activity' => 'Menyaksikan Blue Fire & Sunrise bersama pasangan'],
                ['time' => 'Hari 3 - 08:00', 'activity' => 'Kembali ke hotel, sarapan & check-out'],
                ['time' => 'Hari 3 - 10:00', 'activity' => 'Wisata belanja oleh-oleh khas Banyuwangi'],
                ['time' => 'Hari 3 - 12:00', 'activity' => 'Drop-off ke Bandara/Stasiun – trip selesai'],
            ],
            'includes' => [
                'Hotel bintang 3 selama 2 malam (termasuk sarapan)',
                'Transportasi AC privat selama trip',
                'Guide lokal profesional',
                'Romantic dinner 1 kali',
                'Tiket masuk seluruh destinasi',
                'Alat snorkeling & life jacket',
                'Makan siang 3x',
                'Air mineral',
                'Dokumentasi foto',
            ],
            'excludes' => [
                'Tiket pesawat/kereta',
                'Asuransi perjalanan',
                'Pengeluaran pribadi',
                'Minuman beralkohol',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
        ]);
        $pkg4->destinations()->attach([$destIjen->id, $destDjawatan->id, $destPulauMerah->id]);

        $pkg5 = TourPackage::create([
            'category_id' => $catOpen->id,
            'title' => 'Open Trip Taman Nasional Baluran & Savana Bekol',
            'slug' => 'open-trip-taman-nasional-baluran-savana-bekol',
            'short_description' => 'Trip gabungan ke Africa van Java, jelajahi savana Bekol, Pantai Bama, dan lihat satwa liar yang hidup bebas.',
            'description' => "Nikmati pengalaman safari ala Afrika tanpa harus ke luar negeri. Taman Nasional Baluran, yang dijuluki \"Africa van Java\", menawarkan hamparan savana luas yang menjadi habitat rusa, banteng, kerbau liar, merak, dan berbagai spesies burung eksotis.\n\nDalam paket open trip ini, kamu akan bergabung dengan peserta lain untuk:\n- Berfoto di Gerbang Savana yang ikonik\n- Menjelajahi Savana Bekol dengan latar perbukitan hijau\n- Bersantai di Pantai Bama dengan pasir putih dan ombak tenang\n- Trekking singkat di Hutan Mangrove\n- Spotting satwa liar di habitat aslinya\n\nCocok untuk pecinta alam, fotografer, keluarga, dan siapa pun yang ingin merasakan nuansa Afrika di Jawa.\n\nCatatan Penting:\n- Tersedia setiap hari\n- Waktu terbaik kunjungan pagi hari (satwa lebih aktif)\n- Destinasi: Taman Nasional Baluran, Situbondo\n\nMeeting Point:\nPenjemputan di area Banyuwangi Kota\n\nBarang Wajib Dibawa:\n- Topi, kacamata hitam, sunblock\n- Kamera\n- Air minum\n- Sepatu nyaman untuk jalan",
            'duration_days' => 1,
            'duration_nights' => 0,
            'price' => 285000,
            'price_note' => 'Harga per orang, minimal 2 orang berangkat',
            'image' => '/images/baluran_savannah.png',
            'highlights' => [
                'Savana Bekol – padang rumput ala Afrika',
                'Spotting satwa liar (rusa, banteng, merak)',
                'Pantai Bama dengan pasir putih',
                'Gerbang Savana yang ikonik untuk foto',
                'Trekking Hutan Mangrove',
                'Open trip hemat & seru',
            ],
            'itinerary' => [
                ['time' => '06:00', 'activity' => 'Penjemputan di area Kota Banyuwangi'],
                ['time' => '07:30', 'activity' => 'Tiba di Gerbang TN Baluran & foto-foto'],
                ['time' => '08:00', 'activity' => 'Safari menuju Savana Bekol (spotting satwa)'],
                ['time' => '09:00', 'activity' => 'Eksplorasi Savana Bekol & tracking satwa liar'],
                ['time' => '11:00', 'activity' => 'Menuju Pantai Bama'],
                ['time' => '11:30', 'activity' => 'Bersantai & bermain air di Pantai Bama'],
                ['time' => '12:00', 'activity' => 'Makan siang di area pantai'],
                ['time' => '13:00', 'activity' => 'Trekking singkat Hutan Mangrove'],
                ['time' => '14:00', 'activity' => 'Perjalanan kembali ke Banyuwangi'],
                ['time' => '15:30', 'activity' => 'Drop off di hotel/stasiun – trip selesai'],
            ],
            'includes' => [
                'Transportasi AC (sharing dengan peserta lain)',
                'Guide lokal',
                'Tiket masuk TN Baluran',
                'Makan siang',
                'Air mineral',
            ],
            'excludes' => [
                'Biaya parkir kendaraan pribadi',
                'Tiket WNA',
                'Pengeluaran pribadi',
                'Asuransi perjalanan',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
            'sort_order' => 5,
        ]);
        $pkg5->destinations()->attach([$destBaluran->id]);

        $pkg6 = TourPackage::create([
            'category_id' => $catPrivate->id,
            'title' => 'Privat Trip De Djawatan, Pulau Merah & Green Island',
            'slug' => 'privat-trip-de-djawatan-pulau-merah-green-island',
            'short_description' => 'Eksplorasi tiga destinasi hits Banyuwangi dalam satu hari dengan layanan privat eksklusif tanpa digabung peserta lain.',
            'description' => "Jelajahi tiga destinasi terpopuler di Banyuwangi dalam paket privat 1 hari yang nyaman dan fleksibel. Perjalanan ini hanya untuk kamu dan rombonganmu, tanpa digabung dengan peserta lain.\n\nDestinasi yang akan dikunjungi:\n- De Djawatan Forest – Hutan trembesi raksasa dengan suasana magis bak negeri dongeng, spot foto favorit para influencer\n- Green Island – Snorkeling di perairan jernih dengan biota laut yang indah\n- Pulau Merah – Pantai ikonik dengan bukit hijau di tengahnya, spot sunset terbaik di Banyuwangi\n\nPaket ini sepenuhnya privat, sehingga jadwal dan rute bisa disesuaikan dengan keinginan Anda.\n\nCatatan Penting:\n- Tersedia setiap hari\n- Rute fleksibel bisa ditukar atau ditambah destinasi lain\n- Destinasi: De Djawatan, Green Island, Pulau Merah\n\nMeeting Point:\nPenjemputan gratis di Hotel/Stasiun/Bandara area Banyuwangi\n\nSyarat & Ketentuan:\n- DP 30% saat booking\n- Pembatalan H-7 dikenakan biaya 50%\n- Cuaca buruk dapat mengubah rute perjalanan\n\nBarang Wajib Dibawa:\n- Baju ganti & handuk\n- Sandal\n- Sunblock, topi\n- Kamera",
            'duration_days' => 1,
            'duration_nights' => 0,
            'price' => 550000,
            'price_note' => 'Harga per orang, minimal 2 orang | Harga spesial untuk rombongan',
            'image' => '/images/djawatan_forest.png',
            'highlights' => [
                'Hutan Magis De Djawatan dengan trembesi raksasa',
                'Snorkeling di Green Island',
                'Sunset spektakuler di Pulau Merah',
                'Private trip tanpa gabung peserta lain',
                'Rute fleksibel sesuai keinginan',
                'Guide profesional & berpengalaman',
            ],
            'itinerary' => [
                ['time' => '08:00', 'activity' => 'Penjemputan di hotel/stasiun/bandara Banyuwangi'],
                ['time' => '08:45', 'activity' => 'Tiba di De Djawatan Forest – eksplorasi & foto-foto di hutan trembesi magis'],
                ['time' => '10:30', 'activity' => 'Perjalanan menuju Green Island'],
                ['time' => '11:30', 'activity' => 'Tiba di Green Island – snorkeling menikmati keindahan bawah laut'],
                ['time' => '13:00', 'activity' => 'Makan siang seafood segar di kawasan wisata'],
                ['time' => '14:30', 'activity' => 'Perjalanan menuju Pulau Merah'],
                ['time' => '15:30', 'activity' => 'Tiba di Pulau Merah – bersantai, bermain air, & menikmati sunset'],
                ['time' => '17:30', 'activity' => 'Perjalanan kembali ke Banyuwangi'],
                ['time' => '18:30', 'activity' => 'Drop off di hotel/stasiun – trip selesai'],
            ],
            'includes' => [
                'Transportasi AC (1-4 pax Avanza/Xenia, 5-6 pax Innova)',
                'Driver & BBM',
                'Guide lokal',
                'Alat snorkeling & life jacket',
                'Makan siang',
                'Air mineral',
            ],
            'excludes' => [
                'Tiket masuk destinasi',
                'Tiket WNA',
                'Pengeluaran pribadi',
                'Asuransi perjalanan',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
            'sort_order' => 6,
        ]);
        $pkg6->destinations()->attach([$destDjawatan->id, $destPulauMerah->id]);

        $pkg7 = TourPackage::create([
            'category_id' => $catHoneymoon->id,
            'title' => 'Paket Honeymoon Banyuwangi 2 Hari 1 Malam | Opsi 2',
            'slug' => 'paket-honeymoon-banyuwangi-2-hari-1-malam-opsi-2',
            'short_description' => 'Paket bulan madu singkat 2 hari 1 malam, cocok untuk pasangan dengan waktu terbatas namun tetap romantis.',
            'description' => "Ingin liburan romantis singkat di Banyuwangi tanpa harus mengambil cuti panjang? Paket Honeymoon 2 Hari 1 Malam ini jawabannya. Dirancang khusus untuk pasangan yang ingin quality time bersama.\n\nYang akan Anda nikmati:\n- Menginap di hotel bintang 3 dengan view laut\n- Romantic dinner di restoran tepi pantai\n- Eksplorasi De Djawatan Forest yang magis untuk foto pre-wedding\n- Pendakian Kawah Ijen menyaksikan Blue Fire & Sunrise bersama pasangan\n- Wisata kuliner & belanja oleh-oleh khas Banyuwangi\n\nCatatan Penting:\n- Paket privat untuk 2 orang (pasangan suami-istri)\n- Itinerary dapat disesuaikan dengan preferensi\n- Destinasi: Kawah Ijen, De Djawatan, Banyuwangi Kota\n\nMeeting Point:\nPenjemputan gratis di Bandara/Stasiun area Banyuwangi\n\nSyarat & Ketentuan:\n- DP 30% saat booking\n- Harga sudah termasuk hotel 1 malam\n- Pembatalan H-7 dikenakan biaya 50%",
            'duration_days' => 2,
            'duration_nights' => 1,
            'price' => 3850000,
            'price_note' => 'Harga per pasangan, sudah termasuk hotel 1 malam',
            'image' => '/images/tabuhan_beach.png',
            'highlights' => [
                'Hotel bintang 3 dengan view laut',
                'Romantic dinner di restoran tepi pantai',
                'Sunrise Kawah Ijen & Blue Fire',
                'De Djawatan Forest eksklusif',
                'Wisata kuliner khas Banyuwangi',
                'Trip privat untuk pasangan',
            ],
            'itinerary' => [
                ['time' => 'Hari 1 - 09:00', 'activity' => 'Penjemputan di Bandara/Stasiun Banyuwangi'],
                ['time' => 'Hari 1 - 10:00', 'activity' => 'Check-in hotel & persiapan'],
                ['time' => 'Hari 1 - 11:00', 'activity' => 'Eksplorasi De Djawatan Forest & foto romantis'],
                ['time' => 'Hari 1 - 13:00', 'activity' => 'Makan siang di restoran khas Banyuwangi'],
                ['time' => 'Hari 1 - 14:00', 'activity' => 'Wisata kuliner & belanja oleh-oleh khas Banyuwangi (Bakpia, Sale Pisang, Kopi)'],
                ['time' => 'Hari 1 - 17:00', 'activity' => 'Kembali ke hotel, bersiap untuk romantic dinner'],
                ['time' => 'Hari 1 - 18:30', 'activity' => 'Romantic dinner di restoran tepi pantai'],
                ['time' => 'Hari 2 - 00:30', 'activity' => 'Persiapan pendakian Kawah Ijen'],
                ['time' => 'Hari 2 - 01:00', 'activity' => 'Mulai trekking menuju puncak Kawah Ijen'],
                ['time' => 'Hari 2 - 04:00', 'activity' => 'Menyaksikan Blue Fire & Sunrise bersama pasangan'],
                ['time' => 'Hari 2 - 06:30', 'activity' => 'Kembali ke hotel'],
                ['time' => 'Hari 2 - 08:00', 'activity' => 'Sarapan di hotel & check-out'],
                ['time' => 'Hari 2 - 10:00', 'activity' => 'Drop-off ke Bandara/Stasiun – trip selesai'],
            ],
            'includes' => [
                'Hotel bintang 3 selama 1 malam (termasuk sarapan)',
                'Romantic dinner 1 kali',
                'Transportasi AC privat selama trip',
                'Guide lokal profesional',
                'Tiket masuk Kawah Ijen',
                'Tiket masuk De Djawatan',
                'Makan selama trip (2x makan)',
                'Air mineral',
            ],
            'excludes' => [
                'Tiket pesawat/kereta',
                'Asuransi perjalanan',
                'Pengeluaran pribadi',
                'Minuman beralkohol',
                'Tips guide (seikhlasnya)',
            ],
            'is_featured' => true,
            'sort_order' => 7,
        ]);
        $pkg7->destinations()->attach([$destIjen->id, $destDjawatan->id]);

        Faq::create([
            'question' => 'Kapan waktu terbaik mendaki Kawah Ijen?',
            'answer' => 'Waktu terbaik untuk mendaki Kawah Ijen adalah musim kemarau antara bulan April hingga Oktober, karena cuaca cenderung cerah dan jalur pendakian lebih kering. Untuk melihat Blue Fire, pendakian dimulai sekitar pukul 01:00 dini hari.',
            'category' => 'Perjalanan',
        ]);
        Faq::create([
            'question' => 'Apakah harga paket sudah termasuk tiket pesawat/kereta?',
            'answer' => 'Tidak. Harga paket yang tertera di website kami tidak termasuk tiket pesawat atau kereta api dari/ke kota asal Anda. Kami hanya melayani paket wisata mulai dari meeting point di area Banyuwangi (Stasiun/Bandara/Hotel).',
            'category' => 'Pemesanan',
        ]);
        Faq::create([
            'question' => 'Apakah pemula bisa mendaki Kawah Ijen?',
            'answer' => 'Ya, jalur pendakian Kawah Ijen tergolong aman untuk pemula asalkan dalam kondisi kesehatan yang prima. Jalur memiliki panjang sekitar 3 km dengan estimasi waktu tempuh 1,5 hingga 2 jam.',
            'category' => 'Umum',
        ]);
        Faq::create([
            'question' => 'Apa yang harus saya bawa saat mendaki Kawah Ijen?',
            'answer' => 'Barang wajib dibawa: jaket tebal (suhu puncak 5-10°C), sepatu trekking, headlamp/senter, masker atau respirator untuk gas belerang, air minum minimal 1,5 liter, dan camilan ringan. Jika tidak memiliki, kami menyediakan sewa perlengkapan.',
            'category' => 'Perjalanan',
        ]);
        Faq::create([
            'question' => 'Bagaimana sistem pembayaran paket wisata?',
            'answer' => 'Kami menerapkan sistem DP 30% maksimal 2 minggu sebelum keberangkatan. DP bersifat non-refundable jika pembatalan dari peserta. Pelunasan dilakukan di hari pertama trip. Pembayaran dapat dilakukan via transfer bank atau tunai.',
            'category' => 'Pemesanan',
        ]);

        Article::create([
            'title' => 'Tiket Masuk Kawah Ijen 2025: Harga Terbaru & Tips Kunjungan',
            'slug' => 'tiket-masuk-kawah-ijen-2025-harga-terbaru',
            'excerpt' => 'Kawah Ijen di Banyuwangi adalah salah satu destinasi wisata alam paling ikonik di Indonesia. Ketahui update harga tiket terbarunya di sini.',
            'body' => "Kawah Ijen di Banyuwangi, Jawa Timur, adalah salah satu destinasi wisata alam paling ikonik di Indonesia. Terkenal dengan fenomena alam langka berupa Blue Fire yang hanya bisa ditemukan di dua tempat di dunia, serta danau kawah berwarna toska yang merupakan danau asam terbesar di dunia.\n\nUntuk masuk ke kawasan Kawah Ijen, wisatawan dikenakan biaya tiket masuk yang terbagi menjadi dua kategori: wisatawan domestik dan mancanegara. Harga domistik Rp150.000 per orang di akhir pekan dan Rp100.000 per orang di hari kerja, sementara wisatawan asing dikenakan biaya Rp150.000 per orang.\n\nSelain tiket masuk, terdapat biaya tambahan untuk jasa parkir kendaraan dan asuransi. Disarankan membawa uang tunai yang cukup karena tidak tersedia mesin ATM di area pintu masuk Paltuding. Pembayaran tiket kini sudah bisa dilakukan secara non-tunai melalui aplikasi atau transfer bank.\n\nTips penting: datanglah di hari kerja untuk menghindari antrean panjang dan dapatkan pengalaman yang lebih tenang menikmati keindahan Kawah Ijen. Jangan lupa memakai masker karena udara di sekitar kawah mengandung gas belerang.",
            'image' => '/images/ijen_crater.png',
            'is_published' => true,
            'published_at' => now()->subDays(5),
            'view_count' => 1614,
        ]);

        Article::create([
            'title' => 'Tips Persiapan Mendaki Kawah Ijen untuk Pemula',
            'slug' => 'tips-persiapan-mendaki-kawah-ijen-untuk-pemula',
            'excerpt' => 'Baru pertama kali mendaki Kawah Ijen? Simak tips lengkap persiapan fisik, perlengkapan, dan hal-hal penting yang perlu diketahui.',
            'body' => "Mendaki Kawah Ijen adalah pengalaman yang luar biasa, terutama bagi Anda yang baru pertama kali melakukannya. Dengan ketinggian 2.799 mdpl dan jarak tempuh sekitar 3 kilometer dari Pos Paltuding, pendakian ini tergolong cukup menantang namun masih aman untuk pemula.\n\nPersiapan Fisik: Mulailah latihan jalan kaki atau jogging ringan seminggu sebelum pendakian. Latihan naik turun tangga juga sangat membantu menguatkan otot kaki. Pastikan Anda tidur cukup sebelum hari H karena pendakian dimulai dini hari sekitar pukul 01.00.\n\nPerlengkapan Wajib: Gunakan sepatu trekking yang nyaman dengan grip yang baik. Bawalah jaket tebal karena suhu di puncak bisa mencapai 5-10 derajat Celcius. Headlamp atau senter sangat penting karena pendakian dilakukan dalam gelap. Jangan lupa masker atau respirator untuk melindungi pernapasan dari gas belerang.\n\nTips Lainnya: Bawalah air minum minimal 1,5 liter per orang dan makanan ringan. Sewa guide lokal untuk keamanan dan informasi menarik sepanjang perjalanan. Hindari membawa tas yang terlalu berat karena akan menguras tenaga. Yang terpenting, nikmati setiap langkah perjalanan karena pemandangan yang menanti di puncak sebanding dengan semua usaha Anda.",
            'image' => '/images/ijen_crater.png',
            'category' => 'Tips Wisata',
            'is_published' => true,
            'published_at' => now()->subDays(12),
            'view_count' => 892,
        ]);

        Article::create([
            'title' => '7 Destinasi Wisata Banyuwangi Selain Kawah Ijen yang Wajib Dikunjungi',
            'slug' => 'destinasi-wisata-banyuwangi-selain-kawah-ijen',
            'excerpt' => 'Banyuwangi menyimpan banyak destinasi wisata menakjubkan selain Kawah Ijen. Yuk simak rekomendasi lengkapnya.',
            'body' => "Banyuwangi terkenal dengan Kawah Ijen, namun tahukah Anda bahwa kota di ujung timur Pulau Jawa ini memiliki puluhan destinasi wisata lain yang tak kalah memukau? Berikut 7 destinasi yang wajib masuk daftar kunjungan Anda.\n\n1. De Djawatan Forest: Hutan trembesi raksasa yang suasananya seperti di film-film fantasi. Cocok untuk foto-foto estetik dan piknik santai. Tiket masuknya hanya Rp10.000 per orang.\n\n2. Taman Nasional Baluran: Dijuluki Africa van Java, taman nasional ini memiliki savana luas yang menjadi habitat rusa, banteng, dan berbagai burung eksotis. Puncak kunjungan terbaik adalah saat musim kemarau.\n\n3. Pulau Merah: Pantai dengan bukit hijau di tengahnya yang ikonik. Ombaknya cocok untuk peselancar pemula hingga mahir. Pemandangan sunset dari sini sungguh spektakuler.\n\n4. Pantai Boom: Pantai perkotaan yang menawarkan pemandangan kapal tradisional dan kuliner seafood segar. Tempat yang sempurna untuk bersantai sore hari.\n\n5. Bangsring Underwater: Surga snorkeling di utara Banyuwangi dengan air jernih dan biota laut yang melimpah. Tersedia juga spot untuk berenang bersama hiu jinak.\n\n6. Pura Agung Blambangan: Pura terbesar di Banyuwangi dengan arsitektur megah berlatar perbukitan hijau. Tempat yang tenang untuk refleksi dan menikmati keindahan senja.\n\n7. Kebun Teh Glenmore: Hamparan perkebunan teh hijau yang luas dan sejuk. Selain menikmati pemandangan, Anda juga bisa belajar proses pengolahan teh tradisional.",
            'image' => '/images/djawatan_forest.png',
            'category' => 'Destinasi',
            'is_published' => true,
            'published_at' => now()->subDays(20),
            'view_count' => 2105,
        ]);

        Article::create([
            'title' => 'Panduan Transportasi Menuju Banyuwangi: Darat, Laut, dan Udara',
            'slug' => 'panduan-transportasi-menuju-banyuwangi',
            'excerpt' => 'Bingung bagaimana cara mencapai Banyuwangi? Simak panduan lengkap transportasi yang bisa Anda pilih dari berbagai kota.',
            'body' => "Banyuwangi sebagai destinasi wisata utama di Jawa Timur kini semakin mudah dijangkau dengan berbagai moda transportasi. Berikut panduan lengkapnya.\n\nTransportasi Udara: Bandara Banyuwangi (BWX) melayani penerbangan langsung dari Jakarta (Soekarno-Hatta) dengan maskapai Citilink dan Batik Air. Waktu tempuh sekitar 1,5 jam. Dari Surabaya, tersedia penerbangan perintis dengan waktu tempuh 45 menit.\n\nTransportasi Darat: Perjalanan darat dari Surabaya ke Banyuwangi via tol Trans-Jawa memakan waktu sekitar 4-5 jam. Tersedia bus eksekutif dari terminal Purabaya Surabaya dengan harga tiket Rp70.000-Rp100.000. Perjalanan kereta api bisa dipilih dengan jadwal malam dan pagi, kelas ekonomi hingga eksekutif.\n\nTransportasi Laut: Dari Pelabuhan Ketapang Banyuwangi, Anda bisa menyeberang ke Gilimanuk (Bali) menggunakan kapal feri yang beroperasi 24 jam. Waktu penyeberangan sekitar 30-45 menit dengan tarif Rp6.000-Rp12.000 per orang.\n\nTransportasi Lokal: Setiba di Banyuwangi, Anda bisa menggunakan ojek online, taksi, atau menyewa mobil/motor. Banyak penyedia rental dengan harga terjangkau. Kami juga menyediakan layanan jemput gratis dari stasiun, bandara, atau pelabuhan untuk semua paket wisata.",
            'image' => '/images/banyuwangi_hero.png',
            'category' => 'Tips Wisata',
            'is_published' => true,
            'published_at' => now()->subDays(30),
            'view_count' => 756,
        ]);
    }
}
