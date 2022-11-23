<?php

namespace App\Http\Controllers;

use App\Models\LtSGdS;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtSGdSRequest;
use App\Http\Requests\UpdateLtSGdSRequest;

class LtSGdSController extends Controller
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
        $ltsgds = Inventaris::where('lokasi','LIKE BINARY','%Lt.1 Gd.1%')->get();
        return view('ltsgds.index', compact('ltsgds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltsgds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtSGdSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtSGdSRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgds = new LtSGdS();
        $ltsgds->kode = $request->kode;
        $ltsgds->namaBarang = $request->namaBarang;
        $ltsgds->merk = $request->merk;
        $ltsgds->jumlah = $request->jumlah;
        $ltsgds->hargaSatuan = $request->hargaSatuan;
        $ltsgds->lokasi = $request->lokasi;
        $ltsgds->tahunPembuatan = $request->tahunPembuatan;
        $ltsgds->tahunBeli = $request->tahunBeli;
        $ltsgds->hargaKeseluruhan = $ltsgds->jumlah * $ltsgds->hargaSatuan;
        $ltsgds->kondisi = $request->kondisi;
        $ltsgds->save();
        return redirect()->route('ltsgds.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtSGdS  $ltSGdS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltsgds =LtSGdS::findOrFail($id);
        return view('ltsgds.show', compact('ltsgds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtSGdS  $ltSGdS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltsgds =LtSGdS::findOrFail($id);
        return view('ltsgds.edit', compact('ltsgds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtSGdSRequest  $request
     * @param  \App\Models\LtSGdS  $ltSGdS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtSGdSRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgds =LtSGdS::findOrFail($id);
        $ltsgds->kode = $request->kode;
        $ltsgds->namaBarang = $request->namaBarang;
        $ltsgds->merk = $request->merk;
        $ltsgds->jumlah = $request->jumlah;
        $ltsgds->hargaSatuan = $request->hargaSatuan;
        $ltsgds->lokasi = $request->lokasi;
        $ltsgds->tahunPembuatan = $request->tahunPembuatan;
        $ltsgds->tahunBeli = $request->tahunBeli;
        $ltsgds->hargaKeseluruhan = $ltsgds->jumlah * $ltsgds->hargaSatuan;
        $ltsgds->kondisi = $request->kondisi;
        $ltsgds->save();
        return redirect()->route('ltsgds.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtSGdS  $ltSGdS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltsgds = LtSGdS::findOrFail($id);
        $ltsgds->delete();
        return redirect()->route('ltsgds.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
