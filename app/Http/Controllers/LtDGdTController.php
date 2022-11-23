<?php

namespace App\Http\Controllers;

use App\Models\LtDGdT;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtDGdTRequest;
use App\Http\Requests\UpdateLtDGdTRequest;

class LtDGdTController extends Controller
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
        $ltdgdt = Inventaris::where('lokasi','LIKE BINARY','%Lt.2 Gd.3%')->get();
        return view('ltdgdt.index', compact('ltdgdt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltdgdt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtDGdTRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtDGdTRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgdt = new LtDGdT();
        $ltdgdt->kode = $request->kode;
        $ltdgdt->namaBarang = $request->namaBarang;
        $ltdgdt->merk = $request->merk;
        $ltdgdt->jumlah = $request->jumlah;
        $ltdgdt->hargaSatuan = $request->hargaSatuan;
        $ltdgdt->lokasi = $request->lokasi;
        $ltdgdt->tahunPembuatan = $request->tahunPembuatan;
        $ltdgdt->tahunBeli = $request->tahunBeli;
        $ltdgdt->hargaKeseluruhan = $ltdgdt->jumlah * $ltdgdt->hargaSatuan;
        $ltdgdt->kondisi = $request->kondisi;
        $ltdgdt->save();
        return redirect()->route('ltdgdt.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtDGdT  $ltDGdT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltdgdt =LtDGdT::findOrFail($id);
        return view('ltdgdt.show', compact('ltdgdt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtDGdT  $ltDGdT
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltdgdt =LtDGdT::findOrFail($id);
        return view('ltdgdt.edit', compact('ltdgdt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtDGdTRequest  $request
     * @param  \App\Models\LtDGdT  $ltDGdT
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtDGdTRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgdt =LtDGdT::findOrFail($id);
        $ltdgdt->kode = $request->kode;
        $ltdgdt->namaBarang = $request->namaBarang;
        $ltdgdt->merk = $request->merk;
        $ltdgdt->jumlah = $request->jumlah;
        $ltdgdt->hargaSatuan = $request->hargaSatuan;
        $ltdgdt->lokasi = $request->lokasi;
        $ltdgdt->tahunPembuatan = $request->tahunPembuatan;
        $ltdgdt->tahunBeli = $request->tahunBeli;
        $ltdgdt->hargaKeseluruhan = $ltdgdt->jumlah * $ltdgdt->hargaSatuan;
        $ltdgdt->kondisi = $request->kondisi;
        $ltdgdt->save();
        return redirect()->route('ltdgdt.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtDGdT  $ltDGdT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltdgdt = LtDGdT::findOrFail($id);
        $ltdgdt->delete();
        return redirect()->route('ltdgdt.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
