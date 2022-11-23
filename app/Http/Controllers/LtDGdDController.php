<?php

namespace App\Http\Controllers;

use App\Models\LtDGdD;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtDGdDRequest;
use App\Http\Requests\UpdateLtDGdDRequest;

class LtDGdDController extends Controller
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
        $ltdgdd = Inventaris::where('lokasi','LIKE BINARY','%Lt.2 Gd.2%')->get();
        return view('ltdgdd.index', compact('ltdgdd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltdgdd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtDGdDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtDGdDRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgdd = new Ltdgdd();
        $ltdgdd->kode = $request->kode;
        $ltdgdd->namaBarang = $request->namaBarang;
        $ltdgdd->merk = $request->merk;
        $ltdgdd->jumlah = $request->jumlah;
        $ltdgdd->hargaSatuan = $request->hargaSatuan;
        $ltdgdd->lokasi = $request->lokasi;
        $ltdgdd->tahunPembuatan = $request->tahunPembuatan;
        $ltdgdd->tahunBeli = $request->tahunBeli;
        $ltdgdd->hargaKeseluruhan = $ltdgdd->jumlah * $ltdgdd->hargaSatuan;
        $ltdgdd->kondisi = $request->kondisi;
        $ltdgdd->save();
        return redirect()->route('ltdgdd.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtDGdD  $ltDGdD
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltdgdd =Ltdgdd::findOrFail($id);
        return view('ltdgdd.show', compact('ltdgdd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtDGdD  $ltDGdD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltdgdd =Ltdgdd::findOrFail($id);
        return view('ltdgdd.edit', compact('ltdgdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtDGdDRequest  $request
     * @param  \App\Models\LtDGdD  $ltDGdD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtDGdDRequest $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltdgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltdgdd =Ltdgdd::findOrFail($id);
        $ltdgdd->kode = $request->kode;
        $ltdgdd->namaBarang = $request->namaBarang;
        $ltdgdd->merk = $request->merk;
        $ltdgdd->jumlah = $request->jumlah;
        $ltdgdd->hargaSatuan = $request->hargaSatuan;
        $ltdgdd->lokasi = $request->lokasi;
        $ltdgdd->tahunPembuatan = $request->tahunPembuatan;
        $ltdgdd->tahunBeli = $request->tahunBeli;
        $ltdgdd->hargaKeseluruhan = $ltdgdd->jumlah * $ltdgdd->hargaSatuan;
        $ltdgdd->kondisi = $request->kondisi;
        $ltdgdd->save();
        return redirect()->route('ltdgdd.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtDGdD  $ltDGdD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltdgdd = Ltdgdd::findOrFail($id);
        $ltdgdd->delete();
        return redirect()->route('ltdgdd.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
