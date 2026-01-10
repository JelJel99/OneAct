<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\KomunitasAnggota;
use App\Models\Cerita;
use App\Models\EventProposal;
use App\Models\Program;
use App\Models\Donation;
use App\Models\ProgramRelawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class CommunityController extends Controller
{
    // Show community list page
    public function index()
    {
        $komunitas = Komunitas::all();
        $myKomunitas = collect(); // Empty collection for now
        return view('community', [
            'komunitas' => $komunitas,
            'myKomunitas' => $myKomunitas
        ]);
    }

    // Show community detail
    public function show($id)
    {
        $komunitas = Komunitas::with(
            'organisasi.programs.programRelawan.program',
            'organisasi.programs.donasi'
        )->findOrFail($id);


        $stories = Cerita::where('komunitas_id', $id)
            ->latest()
            ->limit(5)
            ->get();

        $programs = $komunitas->organisasi->programs;

        // Ambil semua programRelawan dari programs
        $programRelawanEvents = $programs->flatMap(fn($program) => $program->programRelawan);

        $upcomingEvent = $programs
            ->where('status', 'approved')
            ->filter(fn ($program) =>
                $program->tenggat &&
                Carbon::parse($program->tenggat)->isFuture()
            )
            ->sortBy('tenggat')
            ->first();

        // Kalau tidak ada programRelawan yang upcoming, ambil donasi
        // if (!$upcomingEvent) {
        //     $donasiEvents = $programs->flatMap(fn($program) => $program->donasi);

        //     $upcomingEvent = $donasiEvents
        //         ->filter(fn($donasi) => $donasi->tenggat && \Carbon\Carbon::parse($donasi->tenggat)->isFuture())
        //         ->sortBy('tenggat')
        //         ->first();
        // }

        return view('community-detail', compact(
            'komunitas',
            'stories',
            'upcomingEvent'
        ));
    }


    public function storeCerita(Request $request, $id)
    {
        $komunitas = Komunitas::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cerita' => 'required|string',
            'peran' => 'required|in:relawan,donatur'
        ]);
        
        Cerita::create([
            'komunitas_id' => $id,
            'nama' => $validated['name'],
            'cerita' => $validated['cerita'],
            'peran' => $validated['peran']
        ]);
        
        return redirect()->route('community.show', $id)
            ->with('success', 'Cerita kamu berhasil dibagikan!');
    }

    public function storeEventProposal(Request $request, $id)
    {
        $komunitas = Komunitas::findOrFail($id);
        
        $validated = $request->validate([
            'eventName' => 'required|string|max:255',
            'eventDescription' => 'required|string',
            'eventDate' => 'required|date',
            'eventLocation' => 'required|string|max:255',
            'volunteerNeeds' => 'nullable|string'
        ]);
        
        $emailContent = "Nama Event: " . $validated['eventName'] . "\n\n";
        $emailContent .= "Deskripsi Event:\n" . $validated['eventDescription'] . "\n\n";
        $emailContent .= "Tanggal yang Diusulkan: " . $validated['eventDate'] . "\n\n";
        $emailContent .= "Lokasi / Tempat: " . $validated['eventLocation'] . "\n\n";
        $emailContent .= "Kebutuhan Relawan:\n" . ($validated['volunteerNeeds'] ?? 'Tidak ada') . "\n";
        
        // Send email to community
        Mail::raw($emailContent, function ($message) use ($komunitas) {
            $message->to($komunitas->email)
                ->subject('Usulan Event');
        });
        
        return redirect()->route('community.show', $id)
            ->with('success', 'Usulan event kamu telah dikirim ke email komunitas!');
    }

    // Community list halaman hanya untuk "Lihat Detail", bukan untuk bergabung langsung
}
