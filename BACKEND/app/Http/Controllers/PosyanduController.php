<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    // Mendapatkan semua data posyandu
    public function index()
    {
        $posyandus = Posyandu::all();
        return response()->json($posyandus);
    }

    // Mendapatkan data posyandu spesifik berdasarkan ID
    public function show($id)
    {
        $posyandu = Posyandu::find($id);
        if ($posyandu) {
            return response()->json($posyandu);
        } else {
            return response()->json(['message' => 'Posyandu tidak ditemukan'], 404);
        }
    }

    // Membuat data posyandu baru
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Membuat posyandu baru dengan data dari request
        $posyandu = Posyandu::create($request->all());
        return response()->json($posyandu, 201);
    }

    // Memperbarui data posyandu yang sudah ada
    public function update(Request $request, $id)
    {
        // Mencari posyandu berdasarkan ID
        $posyandu = Posyandu::find($id);
        if ($posyandu) {
            // Mengupdate data posyandu dengan data dari request
            $posyandu->update($request->all());
            return response()->json($posyandu);
        } else {
            return response()->json(['message' => 'Posyandu tidak ditemukan'], 404);
        }
    }

    // Menghapus data posyandu
    public function destroy($id)
    {
        // Mencari posyandu berdasarkan ID
        $posyandu = Posyandu::find($id);
        if ($posyandu) {
            // Menghapus posyandu jika ditemukan
            $posyandu->delete();
            return response()->json(['message' => 'Posyandu telah dihapus']);
        } else {
            return response()->json(['message' => 'Posyandu tidak ditemukan'], 404);
        }
    }
}
