<?php

namespace App\Http\Controllers;

use App\Models\LtSGdD;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtSGdDRequest;
use App\Http\Requests\UpdateLtSGdDRequest;

class LtSGdDController extends Controller
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
        $ltsgdd = Inventaris::where('lokasi','LIKE BINARY','%Lt.1 Gd.2%')->get();
        return view('ltsgdd.index', compact('ltsgdd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltsgdd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtSGdDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtSGdDRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgdd = new LtSGdD();
        $ltsgdd->kode = $request->kode;
        $ltsgdd->namaBarang = $request->namaBarang;
        $ltsgdd->merk = $request->merk;
        $ltsgdd->jumlah = $request->jumlah;
        $ltsgdd->hargaSatuan = $request->hargaSatuan;
        $ltsgdd->lokasi = $request->lokasi;
        $ltsgdd->tahunPembuatan = $request->tahunPembuatan;
        $ltsgdd->tahunBeli = $request->tahunBeli;
        $ltsgdd->hargaKeseluruhan = $ltsgdd->jumlah * $ltsgdd->hargaSatuan;
        $ltsgdd->kondisi = $request->kondisi;
        $ltsgdd->save();
        return redirect()->route('ltsgdd.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtSGdD  $ltSGdD
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ltsgdd =LtSGdD::findOrFail($id);
        return view('ltsgdd.show', compact('ltsgdd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtSGdD  $ltSGdD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ltsgdd =LtSGdD::findOrFail($id);
        return view('ltsgdd.edit', compact('ltsgdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtSGdDRequest  $request
     * @param  \App\Models\LtSGdD  $ltSGdD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtSGdDRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ltsgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ltsgdd =LtSGdD::findOrFail($id);
        $ltsgdd->kode = $request->kode;
        $ltsgdd->namaBarang = $request->namaBarang;
        $ltsgdd->merk = $request->merk;
        $ltsgdd->jumlah = $request->jumlah;
        $ltsgdd->hargaSatuan = $request->hargaSatuan;
        $ltsgdd->lokasi = $request->lokasi;
        $ltsgdd->tahunPembuatan = $request->tahunPembuatan;
        $ltsgdd->tahunBeli = $request->tahunBeli;
        $ltsgdd->hargaKeseluruhan = $ltsgdd->jumlah * $ltsgdd->hargaSatuan;
        $ltsgdd->kondisi = $request->kondisi;
        $ltsgdd->save();
        return redirect()->route('ltsgdd.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtSGdD  $ltSGdD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ltsgdd = LtSGdD::findOrFail($id);
        $ltsgdd->delete();
        return redirect()->route('ltsgdd.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
