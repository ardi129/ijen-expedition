<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\TourPackage;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'name' => 'Andi Pratama',
                'rating' => 5,
                'comment' => 'Pengalaman yang luar biasa! Pemandu sangat ramah dan profesional. Sunrise di Ijen benar-benar tak terlupakan.',
            ],
            [
                'name' => 'Siti Rahmawati',
                'rating' => 4,
                'comment' => 'Paketnya lengkap, guide informatif. Sayang cuaca agak mendung jadi Blue Fire kurang terlihat jelas. Tapi overall puas!',
            ],
            [
                'name' => 'Budi Santoso',
                'rating' => 5,
                'comment' => 'Mantap! Dari penjemputan sampai drop off semua on time. Snorkeling di Menjangan luar biasa indahnya. Recommended banget!',
            ],
            [
                'name' => 'Dewi Lestari',
                'rating' => 5,
                'comment' => 'Honeymoon package nya romantis banget! Hotelnya nyaman, dinner tepi pantai bikin makin spesial. Makasih Ijen Expedition!',
            ],
            [
                'name' => 'Rizky Hidayat',
                'rating' => 4,
                'comment' => 'Open trip Baluran seru banget! Bisa lihat rusa dan banteng dari dekat. Savana Bekol beneran kayak di Afrika.',
            ],
            [
                'name' => 'Maya Anggraini',
                'rating' => 5,
                'comment' => 'De Djawatan magis banget! Fotonya jadi keren semua. Guide juga jago ambil angle. Puas banget!',
            ],
            [
                'name' => 'Fajar Nugroho',
                'rating' => 4,
                'comment' => 'One day trip Tabuhan-Menjangan-Baluran recommended. Kegiatannya padat tapi ngga capek karena guide ngatur waktu dengan baik.',
            ],
            [
                'name' => 'Nina Wijaya',
                'rating' => 5,
                'comment' => 'Pertama kali snorkeling dan pemandunya sabar banget ngajarin. Terumbu karangnya cantik, ikan-ikannya banyak. Sayang pengen balik lagi!',
            ],
        ];

        TourPackage::all()->each(function ($package) use ($reviews) {
            $count = rand(2, 4);
            $selected = collect($reviews)->random($count);
            foreach ($selected as $review) {
                Review::create([
                    'tour_package_id' => $package->id,
                    'name' => $review['name'],
                    'rating' => $review['rating'],
                    'comment' => $review['comment'],
                    'is_approved' => true,
                    'created_at' => now()->subDays(rand(1, 90)),
                ]);
            }
        });
    }
}
