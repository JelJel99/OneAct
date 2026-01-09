<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\RelawanDaftar;
use App\Models\ProgramRelawan;
use App\Models\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrganisasiController extends Controller
{
    public function showOrg($id)
    {
        $organisasiId = $id;
        $organisasi = Organisasi::findOrFail($organisasiId);

        $programApproved = $organisasi->programs()
            ->where('status', 'approved');

        $jumlah_program_donasi = (clone $programApproved)
            ->where('type', 'donasi')->count();

        $jumlah_program_relawan = (clone $programApproved)
            ->where('type', 'relawan')->count();

        $donasi_aktif = Program::where('organisasi_id', $id)
            ->where('type', 'donasi')
            ->where('status', 'approved')
            ->whereDate('tenggat', '>=', Carbon::today())
            ->count();
        
        $relawan_program_aktif = ProgramRelawan::whereHas('program', function ($q) use ($id) {
                $q->where('organisasi_id', $id)
                ->where('status', 'approved')
                ->where('type', 'relawan');
            })
            ->whereDate('end_date', '>=', Carbon::today())
            ->count();

        $program_aktif = $donasi_aktif + $relawan_program_aktif;

        $relawan_aktif = RelawanDaftar::whereHas('programrelawan', function ($q) use ($organisasiId) {
                $q->whereDate('end_date', '>=', Carbon::today())
                ->whereHas('program', function ($qp) use ($organisasiId) {
                    $qp->where('organisasi_id', $organisasiId)
                        ->where('status', 'approved');
                });
            })
            ->distinct('user_id')
            ->count('user_id');
        
        $program_status = Program::with(['donasi', 'relawan'])
            ->where('organisasi_id', $organisasiId)
            ->where('status', 'approved')
            ->get();

        return response()->json([
            'id' => $organisasi->id,
            'nama' => $organisasi->nama,
            'visi' => $organisasi->visi,
            'misi' => $organisasi->misi,
            'tagline' => $organisasi->tagline ?? 'Setiap orang berhak mendapatkan bantuan yang layak.',
            'kategori' => $organisasi->kategori,
            'lokasi' => $organisasi->alamat ?? '-',
            'jumlah_program_donasi' => $jumlah_program_donasi,
            'jumlah_program_relawan' => $jumlah_program_relawan,
            'program_aktif' => $program_aktif,
            'relawan_aktif' => $relawan_aktif,
            'program_status' => $program_status,
        ]);
    }

    public function dashboardAuth()
    {
        $user = auth()->user();

        if (!$user->organisasi_id) {
            abort(403, 'User tidak memiliki organisasi');
        }

        return $this->showOrg($user->organisasi_id);
    }


}