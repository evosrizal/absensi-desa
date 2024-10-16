<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perangkat;
use Illuminate\Http\Request;

class PerangkatController extends Controller

{
    public function index()
    {
        $perangkats = Perangkat::all();
        return response()->json($perangkats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'required|unique:perangkats'
        ]);

        $perangkat = Perangkat::create($request->all());
        return response()->json($perangkat, 201);
    }

    public function show($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        return response()->json($perangkat);
    }

    public function update(Request $request, $id)
    {
        $perangkat = Perangkat::findOrFail($id);
        $perangkat->update($request->all());
        return response()->json($perangkat);
    }

    public function destroy($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        $perangkat->delete();
        return response()->json(null, 204);
    }
}

