<?php

namespace App\Http\Controllers;

use App\Models\LtDGdS;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtDGdSRequest;
use App\Http\Requests\UpdateLtDGdSRequest;

class LtDGdSController extends Controller
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
        $ltdgds = Inventaris::where('lokasi','LIKE BINARY','%Lt.2 Gd.1%')->get();
        return view('ltdgds.index', compact('ltdgds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltdgds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtDGdSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtDGdSRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgds = new Ltdgds();
        $ltdgds->kode = $request->kode;
        $ltdgds->namaBarang = $request->namaBarang;
        $ltdgds->merk = $request->merk;
        $ltdgds->jumlah = $request->jumlah;
        $ltdgds->hargaSatuan = $request->hargaSatuan;
        $ltdgds->lokasi = $request->lokasi;
        $ltdgds->tahunPembuatan = $request->tahunPembuatan;
        $ltdgds->tahunBeli = $request->tahunBeli;
        $ltdgds->hargaKeseluruhan = $ltdgds->jumlah * $ltdgds->hargaSatuan;
        $ltdgds->kondisi = $request->kondisi;
        $ltdgds->save();
        return redirect()->route('ltdgds.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtDGdS  $ltDGdS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltdgds =Ltdgds::findOrFail($id);
        return view('ltdgds.show', compact('ltdgds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtDGdS  $ltDGdS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltdgds =Ltdgds::findOrFail($id);
        return view('ltdgds.edit', compact('ltdgds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtDGdSRequest  $request
     * @param  \App\Models\LtDGdS  $ltDGdS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtDGdSRequest $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgds =Ltdgds::findOrFail($id);
        $ltdgds->kode = $request->kode;
        $ltdgds->namaBarang = $request->namaBarang;
        $ltdgds->merk = $request->merk;
        $ltdgds->jumlah = $request->jumlah;
        $ltdgds->hargaSatuan = $request->hargaSatuan;
        $ltdgds->lokasi = $request->lokasi;
        $ltdgds->tahunPembuatan = $request->tahunPembuatan;
        $ltdgds->tahunBeli = $request->tahunBeli;
        $ltdgds->hargaKeseluruhan = $ltdgds->jumlah * $ltdgds->hargaSatuan;
        $ltdgds->kondisi = $request->kondisi;
        $ltdgds->save();
        return redirect()->route('ltdgds.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtDGdS  $ltDGdS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltdgds = Ltdgds::findOrFail($id);
        $ltdgds->delete();
        return redirect()->route('ltdgds.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
