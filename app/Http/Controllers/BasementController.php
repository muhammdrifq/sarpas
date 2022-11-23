<?php

namespace App\Http\Controllers;

use App\Models\Basement;
use App\Models\Inventaris;
use App\Http\Requests\StoreBasementRequest;
use App\Http\Requests\UpdateBasementRequest;

class BasementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basement = Inventaris::where('lokasi','LIKE BINARY','%%Basement%%')->get();
        return view('basement.index', compact('basement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBasementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBasementRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:basement',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $basement = new Basement();
        $basement->kode = $request->kode;
        $basement->namaBarang = $request->namaBarang;
        $basement->merk = $request->merk;
        $basement->jumlah = $request->jumlah;
        $basement->hargaSatuan = $request->hargaSatuan;
        $basement->lokasi = $request->lokasi;
        $basement->tahunPembuatan = $request->tahunPembuatan;
        $basement->tahunBeli = $request->tahunBeli;
        $basement->hargaKeseluruhan = $basement->jumlah * $basement->hargaSatuan;
        $basement->kondisi = $request->kondisi;
        $basement->save();
        return redirect()->route('basement.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basement  $basement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $basement = Basement::findOrFail($id);
        return view('basement.show', compact('basement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basement  $basement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $basement = Basement::findOrFail($id);
        return view('basement.edit', compact('basement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBasementRequest  $request
     * @param  \App\Models\Basement  $basement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasementRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:basement',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $basement = Basement::findOrFail($id);
        $basement->kode = $request->kode;
        $basement->namaBarang = $request->namaBarang;
        $basement->merk = $request->merk;
        $basement->jumlah = $request->jumlah;
        $basement->hargaSatuan = $request->hargaSatuan;
        $basement->lokasi = $request->lokasi;
        $basement->tahunPembuatan = $request->tahunPembuatan;
        $basement->tahunBeli = $request->tahunBeli;
        $basement->hargaKeseluruhan = $basement->jumlah * $basement->hargaSatuan;
        $basement->kondisi = $request->kondisi;
        $basement->save();
        return redirect()->route('basement.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basement  $basement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $basement = Basement::findOrFail($id);
        $basement->delete();
        return redirect()->route('basement.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
