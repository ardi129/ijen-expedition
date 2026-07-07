<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\TourPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(TourPackage $tourPackage): View
    {
        return view('pages.booking.create', compact('tourPackage'));
    }

    public function store(BookingRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Simpan data ke database
        $booking = Booking::create($validated);

        // Ambil data paket wisata untuk dicantumkan di pesan WA
        $tourPackage = TourPackage::findOrFail($validated['tour_package_id']);

        // Format Pesan WhatsApp
        $adminPhone = '6285748711646';

        $message = "Halo Admin Ijen Expedition Trip,\n\n";
        $message .= "Saya ingin melakukan pemesanan paket wisata dengan detail sebagai berikut:\n\n";
        $message .= "📌 *Data Pemesan*\n";
        $message .= "- Nama: {$validated['name']}\n";
        $message .= "- Email: {$validated['email']}\n";
        $message .= "- No. Telp/WA: {$validated['phone']}\n\n";

        $message .= "🏖 *Detail Pesanan*\n";
        $message .= "- Paket Wisata: {$tourPackage->title}\n";
        $message .= '- Tanggal Perjalanan: '.date('d F Y', strtotime($validated['travel_date']))."\n";
        $message .= "- Jumlah Peserta: {$validated['number_of_people']} Orang\n";

        if (! empty($validated['special_requests'])) {
            $message .= "- Permintaan Khusus: {$validated['special_requests']}\n";
        }

        $message .= "\nMohon konfirmasi ketersediaan dan informasi total harga. Terima kasih.";

        // Buat URL API WhatsApp
        $whatsappUrl = "https://api.whatsapp.com/send?phone={$adminPhone}&text=".urlencode($message);

        // Redirect pengguna langsung ke aplikasi/web WhatsApp
        return redirect()->away($whatsappUrl);
    }
}
