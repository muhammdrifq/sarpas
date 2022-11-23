<?php

namespace App\Http\Controllers;

use App\Models\FilingCabinet;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class FilingCabinetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filingcabinet = Inventaris::where('namaBarang','LIKE BINARY','%Filing Cabinet%')->get();
        return view('filingcabinet.index', compact('filingcabinet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filingcabinet.create');
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
            'kode' => 'required|unique:filingcabinet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $filingcabinet = new FilingCabinet();
        $filingcabinet->kode = $request->kode;
        $filingcabinet->namaBarang = $request->namaBarang;
        $filingcabinet->merk = $request->merk;
        $filingcabinet->jumlah = $request->jumlah;
        $filingcabinet->hargaSatuan = $request->hargaSatuan;
        $filingcabinet->lokasi = $request->lokasi;
        $filingcabinet->tahunPembuatan = $request->tahunPembuatan;
        $filingcabinet->tahunBeli = $request->tahunBeli;
        $filingcabinet->hargaKeseluruhan = $filingcabinet->jumlah * $filingcabinet->hargaSatuan;
        $filingcabinet->kondisi = $request->kondisi;
        $filingcabinet->save();
        return redirect()->route('filingcabinet.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilingCabinet  $filingCabinet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filingcabinet = Filingcabinet::findOrFail($id);
        return view('filingcabinet.show', compact('filingcabinet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilingCabinet  $filingCabinet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filingcabinet = FilingCabinet::findOrFail($id);
        return view('filingcabinet.edit', compact('filingcabinet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilingCabinet  $filingCabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:filingcabinet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $filingcabinet = FilingCabinet::findOrFail($id);
        $filingcabinet->kode = $request->kode;
        $filingcabinet->namaBarang = $request->namaBarang;
        $filingcabinet->merk = $request->merk;
        $filingcabinet->jumlah = $request->jumlah;
        $filingcabinet->hargaSatuan = $request->hargaSatuan;
        $filingcabinet->lokasi = $request->lokasi;
        $filingcabinet->tahunPembuatan = $request->tahunPembuatan;
        $filingcabinet->tahunBeli = $request->tahunBeli;
        $filingcabinet->hargaKeseluruhan = $filingcabinet->jumlah * $filingcabinet->hargaSatuan;
        $filingcabinet->kondisi = $request->kondisi;
        $filingcabinet->save();
        return redirect()->route('filingcabinet.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilingCabinet  $filingCabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filingcabinet = FilingCabinet::findOrFail($id);
        $filingcabinet->delete();
        return redirect()->route('filingcabinet.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
