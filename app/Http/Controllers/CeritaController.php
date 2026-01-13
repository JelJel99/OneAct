<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\Cerita;
use Illuminate\Http\Request;

class CeritaController extends Controller
{
    // Show create cerita form
    public function create($komunitas_id)
    {
        $komunitas = Komunitas::findOrFail($komunitas_id);
        return view('cerita', ['komunitas' => $komunitas]);
    }

    // Store cerita to database
    public function store(Request $request, $komunitas_id)
    {
        $komunitas = Komunitas::findOrFail($komunitas_id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cerita' => 'required|string',
            'peran' => 'required|in:relawan,donatur'
        ]);
        
        Cerita::create([
            'komunitas_id' => $komunitas_id,
            'nama' => $validated['name'],
            'cerita' => $validated['cerita'],
            'peran' => $validated['peran']
        ]);
        
        return redirect()->route('community.show', $komunitas_id)
            ->with('success', 'Cerita kamu berhasil dibagikan!');
    }
}
