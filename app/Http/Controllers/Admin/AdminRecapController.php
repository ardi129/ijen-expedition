<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminRecapController extends Controller
{
    public function recapPdf(Request $request): Response
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));
        $paymentStatus = $request->input('payment_status', 'all');
        $preview = $request->boolean('preview');

        $query = Booking::with('tourPackage')
            ->whereBetween('travel_date', [$startDate, $endDate])
            ->orderBy('travel_date');

        if ($paymentStatus !== 'all') {
            $query->where('payment_status', $paymentStatus);
        }

        $bookings = $query->get();
        $totalRevenue = $bookings->sum('total_price');
        $totalPaid = $bookings->sum('paid_amount');
        $totalOutstanding = $totalRevenue - $totalPaid;

        $data = [
            'bookings' => $bookings,
            'totalRevenue' => $totalRevenue,
            'totalPaid' => $totalPaid,
            'totalOutstanding' => $totalOutstanding,
            'generatedAt' => now()->translatedFormat('d F Y H:i'),
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];

        $pdf = Pdf::loadView('pdfs.financial-recap', $data);

        if ($preview) {
            return $pdf->stream('rekap-keuangan-'.now()->format('Y-m-d').'.pdf');
        }

        return $pdf->download('rekap-keuangan-'.now()->format('Y-m-d').'.pdf');
    }
}
