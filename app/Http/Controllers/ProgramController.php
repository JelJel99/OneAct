<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with(['organisasi', 'donasi', 'relawan'])
            ->where('status', 'approved')
            ->get();

        return response()->json($programs);
    }

    public function programRelawanApproved()
    {
        return Program::with(['relawan', 'organisasi'])
            ->where('type', 'relawan')      // hanya relawan
            ->where('status', 'approved')   // STATUS DARI TABEL programs
            ->orderBy('created_at', 'desc')
            ->get();
    }

}
