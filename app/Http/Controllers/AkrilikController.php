<?php

namespace App\Http\Controllers;

use App\Models\Akrilik;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class AkrilikController extends Controller
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
       //menampilkan semua data dari model Akrilik
       $akrilik = Inventaris::where('namaBarang','LIKE BINARY','%Akrilik%')->get();
       return view('akrilik.index', compact('akrilik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akrilik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'kode' => 'required|unique:akrilik',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $akrilik = new Akrilik();
        $akrilik->kode = $request->kode;
        $akrilik->namaBarang = $request->namaBarang;
        $akrilik->merk = $request->merk;
        $akrilik->jumlah = $request->jumlah;
        $akrilik->hargaSatuan = $request->hargaSatuan;
        $akrilik->lokasi = $request->lokasi;
        $akrilik->tahunPembuatan = $request->tahunPembuatan;
        $akrilik->tahunBeli = $request->tahunBeli;
        $akrilik->hargaKeseluruhan = $akrilik->jumlah * $akrilik->hargaSatuan;
        $akrilik->kondisi = $request->kondisi;
        $akrilik->save();
        return redirect()->route('akrilik.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akrilik  $akrilik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akrilik = Akrilik::findOrFail($id);
        return view('akrilik.show', compact('akrilik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akrilik  $akrilik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akrilik = Akrilik::findOrFail($id);
        return view('akrilik.edit', compact('akrilik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akrilik  $akrilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:akrilik',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $akrilik = Akrilik::findOrFail($id);
        $akrilik->kode = $request->kode;
        $akrilik->namaBarang = $request->namaBarang;
        $akrilik->merk = $request->merk;
        $akrilik->jumlah = $request->jumlah;
        $akrilik->hargaSatuan = $request->hargaSatuan;
        $akrilik->lokasi = $request->lokasi;
        $akrilik->tahunPembuatan = $request->tahunPembuatan;
        $akrilik->tahunBeli = $request->tahunBeli;
        $akrilik->hargaKeseluruhan = $akrilik->jumlah * $akrilik->hargaSatuan;
        $akrilik->kondisi = $request->kondisi;
        $akrilik->save();
        return redirect()->route('akrilik.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akrilik  $akrilik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akrilik = Akrilik::findOrFail($id);
        $akrilik->delete();
        return redirect()->route('akrilik.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
