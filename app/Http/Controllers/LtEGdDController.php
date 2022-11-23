<?php

namespace App\Http\Controllers;

use App\Models\LtEGdD;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtEGdDRequest;
use App\Http\Requests\UpdateLtEGdDRequest;

class LtEGdDController extends Controller
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
        $ltegdd = Inventaris::where('lokasi','LIKE BINARY','%Lt.4 Gd.2%')->get();
        return view('ltegdd.index', compact('ltegdd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltegdd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtEGdDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtEGdDRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegdd = new LtEGdD();
        $ltegdd->kode = $request->kode;
        $ltegdd->namaBarang = $request->namaBarang;
        $ltegdd->merk = $request->merk;
        $ltegdd->jumlah = $request->jumlah;
        $ltegdd->hargaSatuan = $request->hargaSatuan;
        $ltegdd->lokasi = $request->lokasi;
        $ltegdd->tahunPembuatan = $request->tahunPembuatan;
        $ltegdd->tahunBeli = $request->tahunBeli;
        $ltegdd->hargaKeseluruhan = $ltegdd->jumlah * $ltegdd->hargaSatuan;
        $ltegdd->kondisi = $request->kondisi;
        $ltegdd->save();
        return redirect()->route('ltegdd.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtEGdD  $ltEGdD
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltegdd =LtEGdD::findOrFail($id);
        return view('ltegdd.show', compact('ltegdd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtEGdD  $ltEGdD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltegdd =LtEGdD::findOrFail($id);
        return view('ltegdd.edit', compact('ltegdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtEGdDRequest  $request
     * @param  \App\Models\LtEGdD  $ltEGdD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtEGdDRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegdd =LtEGdD::findOrFail($id);
        $ltegdd->kode = $request->kode;
        $ltegdd->namaBarang = $request->namaBarang;
        $ltegdd->merk = $request->merk;
        $ltegdd->jumlah = $request->jumlah;
        $ltegdd->hargaSatuan = $request->hargaSatuan;
        $ltegdd->lokasi = $request->lokasi;
        $ltegdd->tahunPembuatan = $request->tahunPembuatan;
        $ltegdd->tahunBeli = $request->tahunBeli;
        $ltegdd->hargaKeseluruhan = $ltegdd->jumlah * $ltegdd->hargaSatuan;
        $ltegdd->kondisi = $request->kondisi;
        $ltegdd->save();
        return redirect()->route('ltegdd.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtEGdD  $ltEGdD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltegdd = LtEGdD::findOrFail($id);
        $ltegdd->delete();
        return redirect()->route('ltegdd.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
