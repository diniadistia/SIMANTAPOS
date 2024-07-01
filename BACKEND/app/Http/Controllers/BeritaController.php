<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return response()->json($berita);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'judul_berita' => 'required|string|max:255',
            'slug_berita' => 'required|string|max:255|unique:beritas,slug_berita',
            'content' => 'required',
            'publish' => 'required|date',
        ]);

        $berita = Berita::create($request->all());

        return response()->json(['message' => 'Berita created successfully', 'data' => $berita], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return response()->json($berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'image' => 'string|max:255',
            'tagline' => 'string|max:255',
            'judul_berita' => 'string|max:255',
            'slug_berita' => 'string|max:255|unique:beritas,slug_berita,' . $berita->id,
            'content' => '',
            'publish' => 'date',
        ]);

        $berita->update($request->all());

        return response()->json(['message' => 'Berita updated successfully', 'data' => $berita]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita not found'], 404);
        }

        $berita->delete();

        return response()->json(['message' => 'Berita deleted successfully'], 200);
    }
}
