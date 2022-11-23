<?php

namespace App\Http\Controllers;

use App\Models\Gd4;
use App\Models\Inventaris;
use App\Http\Requests\StoreGd4Request;
use App\Http\Requests\UpdateGd4Request;

class Gd4Controller extends Controller
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
        $gd4 = Inventaris::where('lokasi','LIKE BINARY','%Gd.4%')->get();
        return view('gd4.index', compact('gd4'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gd4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGd4Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGd4Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:gd4',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $gd4 = new Gd4();
        $gd4->kode = $request->kode;
        $gd4->namaBarang = $request->namaBarang;
        $gd4->merk = $request->merk;
        $gd4->jumlah = $request->jumlah;
        $gd4->hargaSatuan = $request->hargaSatuan;
        $gd4->lokasi = $request->lokasi;
        $gd4->tahunPembuatan = $request->tahunPembuatan;
        $gd4->tahunBeli = $request->tahunBeli;
        $gd4->hargaKeseluruhan = $gd4->jumlah * $gd4->hargaSatuan;
        $gd4->kondisi = $request->kondisi;
        $gd4->save();
        return redirect()->route('gd4.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gd4  $gd4
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gd4 =Gd4::findOrFail($id);
        return view('gd4.show', compact('gd4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gd4  $gd4
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gd4 =Gd4::findOrFail($id);
        return view('gd4.edit', compact('gd4'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGd4Request  $request
     * @param  \App\Models\Gd4  $gd4
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGd4Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:gd4',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $gd4 =Gd4::findOrFail($id);
        $gd4->kode = $request->kode;
        $gd4->namaBarang = $request->namaBarang;
        $gd4->merk = $request->merk;
        $gd4->jumlah = $request->jumlah;
        $gd4->hargaSatuan = $request->hargaSatuan;
        $gd4->lokasi = $request->lokasi;
        $gd4->tahunPembuatan = $request->tahunPembuatan;
        $gd4->tahunBeli = $request->tahunBeli;
        $gd4->hargaKeseluruhan = $gd4->jumlah * $gd4->hargaSatuan;
        $gd4->kondisi = $request->kondisi;
        $gd4->save();
        return redirect()->route('gd4.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gd4  $gd4
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gd4 = Gd4::findOrFail($id);
        $gd4->delete();
        return redirect()->route('gd4.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
