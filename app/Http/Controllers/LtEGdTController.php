<?php

namespace App\Http\Controllers;

use App\Models\LtEGdT;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtEGdTRequest;
use App\Http\Requests\UpdateLtEGdTRequest;

class LtEGdTController extends Controller
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
        $ltegdt = Inventaris::where('lokasi','LIKE BINARY','%Lt.4 Gd.3%')->get();
        return view('ltegdt.index', compact('ltegdt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltegdt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtEGdTRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtEGdTRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegdt = new LtEGdT();
        $ltegdt->kode = $request->kode;
        $ltegdt->namaBarang = $request->namaBarang;
        $ltegdt->merk = $request->merk;
        $ltegdt->jumlah = $request->jumlah;
        $ltegdt->hargaSatuan = $request->hargaSatuan;
        $ltegdt->lokasi = $request->lokasi;
        $ltegdt->tahunPembuatan = $request->tahunPembuatan;
        $ltegdt->tahunBeli = $request->tahunBeli;
        $ltegdt->hargaKeseluruhan = $ltegdt->jumlah * $ltegdt->hargaSatuan;
        $ltegdt->kondisi = $request->kondisi;
        $ltegdt->save();
        return redirect()->route('ltegdt.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtEGdT  $ltEGdT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltegdt =LtEGdT::findOrFail($id);
        return view('ltegdt.show', compact('ltegdt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtEGdT  $ltEGdT
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltegdt =LtEGdT::findOrFail($id);
        return view('ltegdt.edit', compact('ltegdt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtEGdTRequest  $request
     * @param  \App\Models\LtEGdT  $ltEGdT
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtEGdTRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegdt =LtEGdT::findOrFail($id);
        $ltegdt->kode = $request->kode;
        $ltegdt->namaBarang = $request->namaBarang;
        $ltegdt->merk = $request->merk;
        $ltegdt->jumlah = $request->jumlah;
        $ltegdt->hargaSatuan = $request->hargaSatuan;
        $ltegdt->lokasi = $request->lokasi;
        $ltegdt->tahunPembuatan = $request->tahunPembuatan;
        $ltegdt->tahunBeli = $request->tahunBeli;
        $ltegdt->hargaKeseluruhan = $ltegdt->jumlah * $ltegdt->hargaSatuan;
        $ltegdt->kondisi = $request->kondisi;
        $ltegdt->save();
        return redirect()->route('ltegdt.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtEGdT  $ltEGdT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltegdt = LtEGdT::findOrFail($id);
        $ltegdt->delete();
        return redirect()->route('ltegdt.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
