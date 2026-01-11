<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramRelawan;

class RelawanController extends Controller
{
    public function show($id)
    {
        $relawan = ProgramRelawan::with('program.organisasi')
            ->where('program_id', $id)
            ->first();

        return response()->json([
            'id' => $relawan->id,
            'program_id' => $relawan->program_id,
            'kategori' => $relawan->kategori,
            'deskripsi' => $relawan->deskripsi,
            'lokasi' => $relawan->lokasi,
            'komitmen' => $relawan->komitmen,
            'keahlian' => $relawan->keahlian,
            'foto' => asset($relawan->foto),
            'tanggung_jawab' => $relawan->tanggung_jawab,
            'persyaratan' => $relawan->persyaratan,
            'benefit' => $relawan->benefit,
            'start_date' => $relawan->start_date,
            'end_date' => $relawan->end_date,
            'kuota' => $relawan->kuota,

            'program' => [
                'judul' => $relawan->program->judul,
                'tenggat' => $relawan->program->tenggat,
                'organisasi' => [
                    'id' => $relawan->program->organisasi->id,
                    'nama' => $relawan->program->organisasi->nama,
                ]
            ]
        ]);
    }

    public function detail($id)
    {
        $relawan = ProgramRelawan::with([
            'program.organisasi'
        ])->findOrFail($id);

        return response()->json($relawan);
    }

}