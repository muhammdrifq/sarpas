<?php

namespace App\Http\Controllers;

use App\Models\Godox;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class GodoxController extends Controller
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
        $godox = Inventaris::where('namaBarang','LIKE BINARY','%Godox%')->get();
        return view('godox.index', compact('godox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('godox.create');
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
            'kode' => 'required|unique:godox',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $godox = new Godox();
        $godox->kode = $request->kode;
        $godox->namaBarang = $request->namaBarang;
        $godox->merk = $request->merk;
        $godox->jumlah = $request->jumlah;
        $godox->hargaSatuan = $request->hargaSatuan;
        $godox->lokasi = $request->lokasi;
        $godox->tahunPembuatan = $request->tahunPembuatan;
        $godox->tahunBeli = $request->tahunBeli;
        $godox->hargaKeseluruhan = $godox->jumlah * $godox->hargaSatuan;
        $godox->kondisi = $request->kondisi;
        $godox->save();
        return redirect()->route('godox.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Godox  $godox
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $godox = Godox::findOrFail($id);
        return view('godox.show', compact('godox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Godox  $godox
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $godox = Godox::findOrFail($id);
        return view('godox.edit', compact('godox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Godox  $godox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:godox',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $godox = Godox::findOrFail($id);
        $godox->kode = $request->kode;
        $godox->namaBarang = $request->namaBarang;
        $godox->merk = $request->merk;
        $godox->jumlah = $request->jumlah;
        $godox->hargaSatuan = $request->hargaSatuan;
        $godox->lokasi = $request->lokasi;
        $godox->tahunPembuatan = $request->tahunPembuatan;
        $godox->tahunBeli = $request->tahunBeli;
        $godox->hargaKeseluruhan = $godox->jumlah * $godox->hargaSatuan;
        $godox->kondisi = $request->kondisi;
        $godox->save();
        return redirect()->route('godox.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Godox  $godox
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $godox = Godox::findOrFail($id);
        $godox->delete();
        return redirect()->route('godox.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
