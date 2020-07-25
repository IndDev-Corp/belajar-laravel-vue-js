<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\NominalQurban;

class NominalQurbanController extends Controller
{
    /**
     * Mendapatkan data nominal qurban
     * 
     * @author Anamcoollzz
     * @return Response
     */
    public function index()
    {
        return NominalQurban::orderByDesc('id')->get();
    }

    /**
     * Menyimpan data nominal qurban ke database
     * 
     * @author Anamcoollzz
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_nominal'      => 'required',
            'nominal_qurban'    => 'required|numeric|min:10000',
            'status'            => 'required',
        ]);
        NominalQurban::create([
            'nama_nominal'   => $request->nama_nominal,
            'nominal_qurban' => $request->nominal_qurban,
            'status'         => $request->status,
        ]);
        return response()->json([
            'message'   => 'Nominal qurban berhasil ditambahkan',
        ]);
    }
}
