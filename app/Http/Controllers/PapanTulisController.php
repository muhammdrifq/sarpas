<?php

namespace App\Http\Controllers;

use App\Models\PapanTulis;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PapanTulisController extends Controller
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
        $papantulis = Inventaris::where('namaBarang','LIKE BINARY', '%Papan Tulis%')->get();
        return view('papantulis.index', compact('papantulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('papantulis.create');
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
            'kode' => 'required|unique:papantulis',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $papantulis = new PapanTulis();
        $papantulis->kode = $request->kode;
        $papantulis->namaBarang = $request->namaBarang;
        $papantulis->merk = $request->merk;
        $papantulis->jumlah = $request->jumlah;
        $papantulis->hargaSatuan = $request->hargaSatuan;
        $papantulis->lokasi = $request->lokasi;
        $papantulis->tahunPembuatan = $request->tahunPembuatan;
        $papantulis->tahunBeli = $request->tahunBeli;
        $papantulis->hargaKeseluruhan = $papantulis->jumlah * $papantulis->hargaSatuan;
        $papantulis->kondisi = $request->kondisi;
        $papantulis->save();
        return redirect()->route('papantulis.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PapanTulis  $papanTulis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $papantulis = PapanTulis::findOrFail($id);
        return view('papantulis.show', compact('papantulis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PapanTulis  $papanTulis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $papantulis = PapanTulis::findOrFail($id);
        return view('papantulis.edit', compact('papantulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PapanTulis  $papanTulis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:papantulis',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $papantulis = PapanTulis::findOrFail($id);
        $papantulis->kode = $request->kode;
        $papantulis->namaBarang = $request->namaBarang;
        $papantulis->merk = $request->merk;
        $papantulis->jumlah = $request->jumlah;
        $papantulis->hargaSatuan = $request->hargaSatuan;
        $papantulis->lokasi = $request->lokasi;
        $papantulis->tahunPembuatan = $request->tahunPembuatan;
        $papantulis->tahunBeli = $request->tahunBeli;
        $papantulis->hargaKeseluruhan = $papantulis->jumlah * $papantulis->hargaSatuan;
        $papantulis->kondisi = $request->kondisi;
        $papantulis->save();
        return redirect()->route('papantulis.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PapanTulis  $papanTulis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $papantulis = PapanTulis::findOrFail($id);
        $papantulis->delete();
        return redirect()->route('papantulis.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
