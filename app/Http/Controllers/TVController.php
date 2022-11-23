<?php

namespace App\Http\Controllers;

use App\Models\TV;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TVController extends Controller
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
        $tv = Inventaris::where('namaBarang','LIKE BINARY', '%TV%')->get();
        return view('tv.index', compact('tv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tv.create');
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
            'kode' => 'required|unique:tv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tv = new TV();
        $tv->kode = $request->kode;
        $tv->namaBarang = $request->namaBarang;
        $tv->merk = $request->merk;
        $tv->jumlah = $request->jumlah;
        $tv->hargaSatuan = $request->hargaSatuan;
        $tv->lokasi = $request->lokasi;
        $tv->tahunPembuatan = $request->tahunPembuatan;
        $tv->tahunBeli = $request->tahunBeli;
        $tv->hargaKeseluruhan = $tv->jumlah * $tv->hargaSatuan;
        $tv->kondisi = $request->kondisi;
        $tv->save();
        return redirect()->route('tv.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TV  $tV
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tv = TV::findOrFail($id);
        return view('tv.show', compact('tv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TV  $tV
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tv = TV::findOrFail($id);
        return view('tv.edit', compact('tv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TV  $tV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tv = TV::findOrFail($id);
        $tv->kode = $request->kode;
        $tv->namaBarang = $request->namaBarang;
        $tv->merk = $request->merk;
        $tv->jumlah = $request->jumlah;
        $tv->hargaSatuan = $request->hargaSatuan;
        $tv->lokasi = $request->lokasi;
        $tv->tahunPembuatan = $request->tahunPembuatan;
        $tv->tahunBeli = $request->tahunBeli;
        $tv->hargaKeseluruhan = $tv->jumlah * $tv->hargaSatuan;
        $tv->kondisi = $request->kondisi;
        $tv->save();
        return redirect()->route('tv.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TV  $tV
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tv = TV::findOrFail($id);
        $tv->delete();
        return redirect()->route('tv.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
