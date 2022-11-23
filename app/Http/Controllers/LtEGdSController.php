<?php

namespace App\Http\Controllers;

use App\Models\LtEGdS;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtEGdSRequest;
use App\Http\Requests\UpdateLtEGdSRequest;

class LtEGdSController extends Controller
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
        $ltegds = Inventaris::where('lokasi','LIKE BINARY','%Lt.4 Gd.1%')->get();
        return view('ltegds.index', compact('ltegds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltegds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtEGdSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtEGdSRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegds = new LtEGdS();
        $ltegds->kode = $request->kode;
        $ltegds->namaBarang = $request->namaBarang;
        $ltegds->merk = $request->merk;
        $ltegds->jumlah = $request->jumlah;
        $ltegds->hargaSatuan = $request->hargaSatuan;
        $ltegds->lokasi = $request->lokasi;
        $ltegds->tahunPembuatan = $request->tahunPembuatan;
        $ltegds->tahunBeli = $request->tahunBeli;
        $ltegds->hargaKeseluruhan = $ltegds->jumlah * $ltegds->hargaSatuan;
        $ltegds->kondisi = $request->kondisi;
        $ltegds->save();
        return redirect()->route('ltegds.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtEGdS  $ltEGdS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltegds =LtEGdS::findOrFail($id);
        return view('ltegds.show', compact('ltegds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtEGdS  $ltEGdS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltegds =LtEGdS::findOrFail($id);
        return view('ltegds.edit', compact('ltegds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtEGdSRequest  $request
     * @param  \App\Models\LtEGdS  $ltEGdS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtEGdSRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltegds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltegds =LtEGdS::findOrFail($id);
        $ltegds->kode = $request->kode;
        $ltegds->namaBarang = $request->namaBarang;
        $ltegds->merk = $request->merk;
        $ltegds->jumlah = $request->jumlah;
        $ltegds->hargaSatuan = $request->hargaSatuan;
        $ltegds->lokasi = $request->lokasi;
        $ltegds->tahunPembuatan = $request->tahunPembuatan;
        $ltegds->tahunBeli = $request->tahunBeli;
        $ltegds->hargaKeseluruhan = $ltegds->jumlah * $ltegds->hargaSatuan;
        $ltegds->kondisi = $request->kondisi;
        $ltegds->save();
        return redirect()->route('ltegds.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtEGdS  $ltEGdS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltegds = LtEGdS::findOrFail($id);
        $ltegds->delete();
        return redirect()->route('ltegds.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
