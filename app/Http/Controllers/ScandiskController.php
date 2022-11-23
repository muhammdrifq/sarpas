<?php

namespace App\Http\Controllers;

use App\Models\Scandisk;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ScandiskController extends Controller
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
        $scandisk = Inventaris::where('namaBarang','LIKE BINARY', '%Scandisk%')->get();
        return view('scandisk.index', compact('scandisk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scandisk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:scandisk',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $scandisk = new Scandisk();
        $scandisk->kode = $request->kode;
        $scandisk->namaBarang = $request->namaBarang;
        $scandisk->merk = $request->merk;
        $scandisk->jumlah = $request->jumlah;
        $scandisk->hargaSatuan = $request->hargaSatuan;
        $scandisk->lokasi = $request->lokasi;
        $scandisk->tahunPembuatan = $request->tahunPembuatan;
        $scandisk->tahunBeli = $request->tahunBeli;
        $scandisk->hargaKeseluruhan = $scandisk->jumlah * $scandisk->hargaSatuan;
        $scandisk->kondisi = $request->kondisi;
        $scandisk->save();
        return redirect()->route('scandisk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scandisk  $scandisk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scandisk = Scandisk::findOrFail($id);
        return view('scandisk.show', compact('scandisk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scandisk  $scandisk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scandisk = Scandisk::findOrFail($id);
        return view('scandisk.edit', compact('scandisk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scandisk  $scandisk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:scandisk',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $scandisk = Scandisk::findOrFail($id);
        $scandisk->kode = $request->kode;
        $scandisk->namaBarang = $request->namaBarang;
        $scandisk->merk = $request->merk;
        $scandisk->jumlah = $request->jumlah;
        $scandisk->hargaSatuan = $request->hargaSatuan;
        $scandisk->lokasi = $request->lokasi;
        $scandisk->tahunPembuatan = $request->tahunPembuatan;
        $scandisk->tahunBeli = $request->tahunBeli;
        $scandisk->hargaKeseluruhan = $scandisk->jumlah * $scandisk->hargaSatuan;
        $scandisk->kondisi = $request->kondisi;
        $scandisk->save();
        return redirect()->route('scandisk.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scandisk  $scandisk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scandisk = Scandisk::findOrFail($id);
        $scandisk->delete();
        return redirect()->route('scandisk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
