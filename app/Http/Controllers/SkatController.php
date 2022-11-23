<?php

namespace App\Http\Controllers;

use App\Models\Skat;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class SkatController extends Controller
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
        $skat = Inventaris::where('namaBarang', 'LIKE BINARY','%skat%')->get();
        return view('skat.index', compact('skat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skat.create');
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
            'kode' => 'required|unique:skat',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $skat = new Skat();
        $skat->kode = $request->kode;
        $skat->namaBarang = $request->namaBarang;
        $skat->merk = $request->merk;
        $skat->jumlah = $request->jumlah;
        $skat->hargaSatuan = $request->hargaSatuan;
        $skat->lokasi = $request->lokasi;
        $skat->tahunPembuatan = $request->tahunPembuatan;
        $skat->tahunBeli = $request->tahunBeli;
        $skat->hargaKeseluruhan = $skat->jumlah * $skat->hargaSatuan;
        $skat->kondisi = $request->kondisi;
        $skat->save();
        return redirect()->route('skat.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skat  $skat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skat = Skat::findOrFail($id);
        return view('skat.show', compact('skat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skat  $skat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skat = Skat::findOrFail($id);
        return view('skat.edit', compact('skat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skat  $skat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:skat',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $skat = skat::findOrFail($id);
        $skat->kode = $request->kode;
        $skat->namaBarang = $request->namaBarang;
        $skat->merk = $request->merk;
        $skat->jumlah = $request->jumlah;
        $skat->hargaSatuan = $request->hargaSatuan;
        $skat->lokasi = $request->lokasi;
        $skat->tahunPembuatan = $request->tahunPembuatan;
        $skat->tahunBeli = $request->tahunBeli;
        $skat->hargaKeseluruhan = $skat->jumlah * $skat->hargaSatuan;
        $skat->kondisi = $request->kondisi;
        $skat->save();
        return redirect()->route('skat.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skat  $skat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skat = Skat::findOrFail($id);
        $skat->delete();
        return redirect()->route('skat.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
