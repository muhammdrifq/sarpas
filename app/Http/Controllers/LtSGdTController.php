<?php

namespace App\Http\Controllers;

use App\Models\LtSGdT;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtSGdTRequest;
use App\Http\Requests\UpdateLtSGdTRequest;

class LtSGdTController extends Controller
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
        $ltsgdt = Inventaris::where('lokasi','LIKE BINARY','%Lt.1 Gd.3%')->get();
        return view('ltsgdt.index', compact('ltsgdt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltsgdt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtSGdTRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtSGdTRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgdt = new LtSGdT();
        $ltsgdt->kode = $request->kode;
        $ltsgdt->namaBarang = $request->namaBarang;
        $ltsgdt->merk = $request->merk;
        $ltsgdt->jumlah = $request->jumlah;
        $ltsgdt->hargaSatuan = $request->hargaSatuan;
        $ltsgdt->lokasi = $request->lokasi;
        $ltsgdt->tahunPembuatan = $request->tahunPembuatan;
        $ltsgdt->tahunBeli = $request->tahunBeli;
        $ltsgdt->hargaKeseluruhan = $ltsgdt->jumlah * $ltsgdt->hargaSatuan;
        $ltsgdt->kondisi = $request->kondisi;
        $ltsgdt->save();
        return redirect()->route('ltsgdt.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtSGdT  $ltSGdT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltsgdt =LtSGdT::findOrFail($id);
        return view('ltsgdt.show', compact('ltsgdt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtSGdT  $ltSGdT
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltsgdt =LtSGdT::findOrFail($id);
        return view('ltsgdt.edit', compact('ltsgdt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtSGdTRequest  $request
     * @param  \App\Models\LtSGdT  $ltSGdT
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtSGdTRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgdt =LtSGdT::findOrFail($id);
        $ltsgdt->kode = $request->kode;
        $ltsgdt->namaBarang = $request->namaBarang;
        $ltsgdt->merk = $request->merk;
        $ltsgdt->jumlah = $request->jumlah;
        $ltsgdt->hargaSatuan = $request->hargaSatuan;
        $ltsgdt->lokasi = $request->lokasi;
        $ltsgdt->tahunPembuatan = $request->tahunPembuatan;
        $ltsgdt->tahunBeli = $request->tahunBeli;
        $ltsgdt->hargaKeseluruhan = $ltsgdt->jumlah * $ltsgdt->hargaSatuan;
        $ltsgdt->kondisi = $request->kondisi;
        $ltsgdt->save();
        return redirect()->route('ltsgdt.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtSGdT  $ltSGdT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltsgdt = LtSGdT::findOrFail($id);
        $ltsgdt->delete();
        return redirect()->route('ltsgdt.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
