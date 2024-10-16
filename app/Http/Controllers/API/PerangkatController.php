<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AbsensiPetugas;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    public function index()
    {
        $absensi = AbsensiPetugas::with('perangkat')->get();
        return response()->json($absensi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'perangkat_id' => 'required|exists:perangkats,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'status' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        $absensi = AbsensiPetugas::create($request->all());
        return response()->json($absensi, 201);
    }

    public function show($id)
    {
        $absensi = AbsensiPetugas::with('perangkat')->findOrFail($id);
        return response()->json($absensi);
    }

    public function update(Request $request, $id)
    {
        $absensi = AbsensiPetugas::findOrFail($id);
        $absensi->update($request->all());
        return response()->json($absensi);
    }

    public function destroy($id)
    {
        $absensi = AbsensiPetugas::findOrFail($id);
        $absensi->delete();
        return response()->json(null, 204);
    }
}
