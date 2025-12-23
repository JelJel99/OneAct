<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;

use App\Models\ProgramRelawan;
use App\Models\Donasi;

class AdminController extends Controller
{
    /* =====================
     | DASHBOARD
     ===================== */
    public function index()
    {
        return view('adminDash');
    }

    /* =====================
     | USER MANAGEMENT
     ===================== */
    public function users()
    {
        return response()->json(
            User::select('id', 'name', 'email', 'role', 'status')->get()
        );
    }

    public function suspendUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return response()->json(['message' => 'User suspended']);
    }

    public function unsuspendUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return response()->json(['message' => 'User unsuspended']);
    }

    /* =====================
     | PROGRAM MANAGEMENT
     ===================== */
    public function programs()
    {
        $programs = Program::with('organisasi')
            ->select('id', 'judul', 'type', 'status', 'organisasi_id')
            ->get();

        return $programs->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->judul,
                'type' => $p->type,
                'status' => $p->status,
                'organisasi_nama' => $p->organisasi->nama ?? '-',
            ];
        });
        // $volunteer = Program::where('programs.type', 'relawan')
        //     ->leftJoin('programrelawan', 'programrelawan.program_id', '=', 'programs.id')
        //     ->leftJoin('organisasi', 'programs.organisasi_id', '=', 'organisasi.id')
        //     ->select(
        //         'programs.id',
        //         'programs.judul as name',
        //         'programrelawan.kategori',
        //         'programs.type',
        //         'programs.status',
        //         'organisasi.nama as organisasi_nama'
        //     );

        // $donation = Program::where('programs.type', 'donasi')
        //     ->leftJoin('donasi', 'donasi.program_id', '=', 'programs.id')
        //     ->leftJoin('organisasi', 'programs.organisasi_id', '=', 'organisasi.id')
        //     ->select(
        //         'programs.id',
        //         'programs.judul as name',
        //         DB::raw('NULL as kategori'),
        //         'programs.type',
        //         'programs.status',
        //         'organisasi.nama as organisasi_nama'
        //     );

        // return $volunteer->unionAll($donation)->get();
    }

    public function programDetail($id)
    {
        $program = Program::with(['organisasi', 'programRelawan', 'donasi'])
            ->findOrFail($id);

        $detail = [
            'id' => $program->id,
            'judul' => $program->judul,
            'type' => $program->type,
            'status' => $program->status,
            'organisasi_nama' => $program->organisasi->nama ?? null,
        ];

        if ($program->type === 'relawan' && $program->programRelawan) {
            $r = $program->programRelawan;
            $detail += [
                'kategori' => $r->kategori,
                'tenggat' => $r->tenggat,
                'deskripsi' => $r->deskripsi,
                'lokasi' => $r->lokasi,
                'komitmen' => $r->komitmen,
                'keahlian' => $r->keahlian,
                'foto' => $r->foto ? asset('storage/'.$r->foto) : null,
            ];
        }

        if ($program->type === 'donasi' && $program->donasi) {
            $d = $program->donasi;
            $detail += [
                'deskripsi' => $d->deskripsi,
                'target' => $d->target,
                'jumlahsaatini' => $d->jumlahsaatini,
                'foto' => $d->foto ? asset('storage/'.$d->foto) : null,
            ];
        }

        return response()->json($detail);
        // $program = Program::findOrFail($id);

        // $detail = [
        //     'id' => $program->id,
        //     'judul' => $program->judul,
        //     'type' => $program->type,
        //     'status' => $program->status,
        //     'organisasi_nama' => $program->organisasi->nama ?? null,
        // ];

        // if ($program->type === 'relawan') {
        //     $relawan = ProgramRelawan::where('program_id', $id)->first();
        //     if ($relawan) {
        //         $detail = array_merge($detail, [
        //             'kategori' => $relawan->kategori,
        //             'tenggat' => $relawan->tenggat,
        //             'deskripsi' => $relawan->deskripsi,
        //             'lokasi' => $relawan->lokasi,
        //             'komitmen' => $relawan->komitmen,
        //             'keahlian' => $relawan->keahlian,
        //             'foto' => $relawan->foto ? asset('storage/' . $relawan->foto) : null,
        //         ]);
        //     }
        // } elseif ($program->type === 'donasi') {
        //     $donasi = Donasi::where('program_id', $id)->first();
        //     if ($donasi) {
        //         $detail = array_merge($detail, [
        //             'deskripsi' => $donasi->deskripsi,
        //             'target' => $donasi->target,
        //             'jumlahsaatini' => $donasi->jumlahsaatini,
        //             'foto' => $donasi->foto ? asset('storage/' . $donasi->foto) : null,
        //         ]);
        //     }
        // }

        // return response()->json($detail);
    }


    public function approveProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 'approved';
        $program->save();

        // Copy data ke tabel detail jika belum ada
        if ($program->type == 'relawan') {
            $exists = ProgramRelawan::where('program_id', $program->id)->exists();
            if (!$exists) {
                ProgramRelawan::create([
                    'program_id' => $program->id,
                    'kategori' => null,  // bisa diisi sesuai kebutuhan
                    'tenggat' => null,
                    'deskripsi' => null,
                    'lokasi' => null,
                    'komitmen' => null,
                    'keahlian' => null,
                    'foto' => null,
                ]);
            }
        } elseif ($program->type == 'donasi') {
            $exists = Donasi::where('program_id', $program->id)->exists();
            if (!$exists) {
                Donasi::create([
                    'program_id' => $program->id,
                    'deskripsi' => null,
                    'foto' => null,
                    'target' => 0,
                    'jumlahsaatini' => 0,
                ]);
            }
        }

        return response()->json(['message' => 'Program approved']);
    }

    public function rejectProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 'rejected';
        $program->save();

        return response()->json(['message' => 'Program rejected']);
    }



    // public function programDetail($id)
    // {
    //     return Program::findOrFail($id);
    // }

}