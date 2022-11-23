<?php

namespace App\Http\Controllers;

use App\Models\TabungPemadam;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TabungPemadamController extends Controller
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
        $tabungpemadam = Inventaris::where('namaBarang','LIKE BINARY', '%Tabung Pemadam%')->get();
        return view('tabungpemadam.index', compact('tabungpemadam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabungpemadam.create');
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
            'kode' => 'required|unique:tabungpemadam',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tabungpemadam = new TabungPemadam();
        $tabungpemadam->kode = $request->kode;
        $tabungpemadam->namaBarang = $request->namaBarang;
        $tabungpemadam->merk = $request->merk;
        $tabungpemadam->jumlah = $request->jumlah;
        $tabungpemadam->hargaSatuan = $request->hargaSatuan;
        $tabungpemadam->lokasi = $request->lokasi;
        $tabungpemadam->tahunPembuatan = $request->tahunPembuatan;
        $tabungpemadam->tahunBeli = $request->tahunBeli;
        $tabungpemadam->hargaKeseluruhan = $tabungpemadam->jumlah * $tabungpemadam->hargaSatuan;
        $tabungpemadam->kondisi = $request->kondisi;
        $tabungpemadam->save();
        return redirect()->route('tabungpemadam.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TabungPemadam  $tabungPemadam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabungpemadam = TabungPemadam::findOrFail($id);
        return view('tabungpemadam.show', compact('tabungpemadam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabungPemadam  $tabungPemadam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungpemadam = TabungPemadam::findOrFail($id);
        return view('tabungpemadam.edit', compact('tabungpemadam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabungPemadam  $tabungPemadam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tabungpemadam',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tabungpemadam = TabungPemadam::findOrFail($id);
        $tabungpemadam->kode = $request->kode;
        $tabungpemadam->namaBarang = $request->namaBarang;
        $tabungpemadam->merk = $request->merk;
        $tabungpemadam->jumlah = $request->jumlah;
        $tabungpemadam->hargaSatuan = $request->hargaSatuan;
        $tabungpemadam->lokasi = $request->lokasi;
        $tabungpemadam->tahunPembuatan = $request->tahunPembuatan;
        $tabungpemadam->tahunBeli = $request->tahunBeli;
        $tabungpemadam->hargaKeseluruhan = $tabungpemadam->jumlah * $tabungpemadam->hargaSatuan;
        $tabungpemadam->kondisi = $request->kondisi;
        $tabungpemadam->save();
        return redirect()->route('tabungpemadam.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabungPemadam  $tabungPemadam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabungpemadam = TabungPemadam::findOrFail($id);
        $tabungpemadam->delete();
        return redirect()->route('tabungpemadam.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
