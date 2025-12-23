<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SupportController extends Controller
{
    // ------------------------------------
    // 1. FAQ (Read)
    // ------------------------------------
    public function getFaqs()
    {
        // Ambil semua FAQ, diurutkan berdasarkan 'order' dan 'category'
        $faqs = Faq::orderBy('category')->orderBy('order')->get(['question', 'answer', 'category']);

        return response()->json([
            'success' => true,
            'data' => $faqs
        ]);
    }

    // ------------------------------------
    // 2. HUBUNGI KAMI (Create)
    // ------------------------------------
    public function submitContact(Request $request)
    {
        try {
            // Validasi input
            $validated = Validator::make($request->all(), [
                'name' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:1000',
            ])->validate();

            // Cek apakah user sedang login
            $userId = auth('sanctum')->check() ? auth('sanctum')->id() : null;

            // Simpan pesan ke database
            ContactMessage::create([
                'user_id' => $userId, // Akan terisi jika user login
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah berhasil terkirim. Kami akan merespons secepatnya.'
            ], 201); // 201 Created

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal: ' . array_values($e->errors())[0][0],
                'errors' => $e->errors()
            ], 422); // 422 Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat menyimpan pesan.'
            ], 500);
        }
    }
}
