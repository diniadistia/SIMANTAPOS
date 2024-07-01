<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $penimbangans = Penimbangan::all();
        return response()->json($penimbangans);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'nullable|numeric',
            'data_balita_id' => 'required|exists:data_balita,id',
        ]);


        $penimbangan = Penimbangan::create([
            'nama' => $request->input('nama'),
        ]);

        return response()->json(['message' => 'Penimbangan created successfully', 'data' => $penimbangan], 201);
    }

    // Display the specified resource.
    public function show($id)
    {
        $penimbangan = Penimbangan::findOrFail($id);
        return response()->json($penimbangan);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'nullable|numeric',
            'data_balita_id' => 'required|exists:data_balita,id',
        ]);

        $upPenimbangan = Penimbangan::find($id);
        $upPenimbangan->Penimbangan = $request->Penimbangan;
        $upPenimbangan->save();
        return response()->json([
            'message' => 'Data Anda Berhasil Di Update',
            'Success' => true,
        ]);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $penimbangan = Penimbangan::findOrFail($id);
        $penimbangan->delete();
        return response()->json(null, 204);
    }
}
