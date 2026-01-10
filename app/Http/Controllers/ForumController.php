<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Komentar;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index($komunitas_id)
    {
        $komunitas = Komunitas::findOrFail($komunitas_id);
        $forum = Forum::where('komunitas_id', $komunitas_id)->with('user', 'komentar.user')->orderBy('created_at', 'asc')->get();
        
        return view('forum', [
            'komunitas' => $komunitas,
            'forum' => $forum
        ]);
    }

    public function store(Request $request, $komunitas_id)
    {
        $validated = $request->validate([
            'pesan' => 'required|string',
            'user_name' => 'required|string|max:255',
        ]);

        Forum::create([
            'komunitas_id' => $komunitas_id,
            'user_id' => Auth::id(),
            'user_name' => $validated['user_name'],
            'pesan' => $validated['pesan'],
        ]);

        return back()->with('success', 'Pesan berhasil dikirim');
    }

    public function storeKomentar(Request $request, $forum_id)
    {
        $validated = $request->validate([
            'komentar' => 'required|string',
        ]);

        Komentar::create([
            'forum_id' => $forum_id,
            'user_id' => Auth::id(),
            'komentar' => $validated['komentar'],
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
