<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\EventProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventProposalController extends Controller
{
    // Show create event proposal form
    public function create($komunitas_id)
    {
        $komunitas = Komunitas::findOrFail($komunitas_id);
        return view('event', ['komunitas' => $komunitas]);
    }

    // Store event proposal and send email
    public function store(Request $request, $komunitas_id)
    {
        $komunitas = Komunitas::findOrFail($komunitas_id);
        
        $validated = $request->validate([
            'eventName' => 'required|string|max:255',
            'eventDescription' => 'required|string',
            'eventDate' => 'required|date',
            'eventLocation' => 'required|string|max:255',
            'volunteerNeeds' => 'nullable|string'
        ]);
        
        // Create plain text email content - exactly as form fields
        $emailContent = "USULAN EVENT BARU\n\n";
        $emailContent .= "Nama Event: " . $validated['eventName'] . "\n\n";
        $emailContent .= "Deskripsi Event:\n" . $validated['eventDescription'] . "\n\n";
        $emailContent .= "Tanggal yang Diusulkan: " . $validated['eventDate'] . "\n\n";
        $emailContent .= "Lokasi / Tempat: " . $validated['eventLocation'] . "\n\n";
        $emailContent .= "Kebutuhan Relawan:\n" . ($validated['volunteerNeeds'] ?? 'Tidak ada') . "\n\n";
        $emailContent .= "---\nUSULAN INI DIKIRIM MELALUI PLATFORM ONEACT";
        
        // Send email to community
        Mail::raw($emailContent, function ($message) use ($komunitas) {
            $message->to($komunitas->email)
                ->subject('Usulan Event Baru - ' . $komunitas->nama);
        });
        
        return redirect()->route('community.show', $komunitas_id)
            ->with('success', 'Usulan event kamu telah dikirim ke email komunitas!');
    }
}
