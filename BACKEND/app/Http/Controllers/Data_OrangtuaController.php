<?php

namespace App\Http\Controllers;

use App\Models\data_orangtua;
use Illuminate\Http\Request;

class Data_OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataOrangtua = Data_Orangtua::all();
        return response()->json([
            'success' => true,
            'data' => $dataOrangtua,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
        ]);

        $dataOrangtua = Data_Orangtua::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data orangtua berhasil ditambahkan.',
            'data' => $dataOrangtua,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataOrangtua = Data_Orangtua::find($id);

        if (!$dataOrangtua) {
            return response()->json([
                'success' => false,
                'message' => 'Data orangtua tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $dataOrangtua,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
        ]);

        $dataOrangtua = Data_Orangtua::find($id);

        if (!$dataOrangtua) {
            return response()->json([
                'success' => false,
                'message' => 'Data orangtua tidak ditemukan.'
            ], 404);
        }

        $dataOrangtua->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data orangtua berhasil diperbarui.',
            'data' => $dataOrangtua,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataOrangtua = Data_Orangtua::find($id);

        if (!$dataOrangtua) {
            return response()->json([
                'success' => false,
                'message' => 'Data orangtua tidak ditemukan.'
            ], 404);
        }

        $dataOrangtua->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data orangtua berhasil dihapus.',
        ]);
    }
}
