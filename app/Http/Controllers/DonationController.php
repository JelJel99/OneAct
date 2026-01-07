<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Transaction;

class DonationController extends Controller
{
    // LIST DONASI
    public function index()
    {
        $donations = Donation::all();
        return view('donation', compact('donations'));
    }

    public function apiIndex()
    {
        $donations = Donation::whereHas('program', function ($q) {
            $q->where('status', 'approved');
        })
        ->with('program.organisasi', 'transactions')
        ->get();

        return response()->json(
            $donations->map(function ($d) {
                return [
                    'id' => $d->id,
                    'judul' => $d->program->judul,
                    'kategori' => 'Umum', // atau dari tabel lain kalau ada
                    'organisasi' => $d->program->organisasi->nama ?? '-',
                    'tenggat' => $d->program->tenggat,
                    'foto' => $d->foto,
                    'deskripsi' => $d->deskripsi,
                    'target' => $d->target,
                    'terkumpul' => $d->jumlahsaatini,
                    'donatur' => $d->transactions()->count(),
                ];
            })
        );
    }


    // HALAMAN PAYMENT
    public function show(Donation $donation)
    {
        // $donation = Donation::findOrFail($id);
        return view('payment', compact('donation'));
    }

    // SIMPAN TRANSAKSI
    public function pay(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'payment_type' => 'required|in:bank,ewallet',
            'payment_method' => 'required|string',
        ]);

        $paymentTypeLabel = match ($request->payment_type) {
            'ewallet' => 'e-wallet',
            'bank' => 'bank',
        };

        Transaction::create([
            'donasi_id' => $id,
            'user_id' => auth()->id(),
            'jumlah' => $request->amount,
            'payment_type' => $paymentTypeLabel,
            'payment_method' => $request->payment_method,
            'buktibayar' => $request->file('proof')
                ? $request->file('proof')->store('proofs', 'public')
                : null,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    // // HALAMAN STATUS
    // public function status()
    // {
    //     return view('donation.status');
    // }
}