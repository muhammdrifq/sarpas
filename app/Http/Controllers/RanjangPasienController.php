<?php

namespace App\Http\Controllers;

use App\Models\RanjangPasien;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class RanjangPasienController extends Controller
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
        $ranjangpasien = Inventaris::where('namaBarang','LIKE BINARY', '%ranjangpasien%')->get();
        return view('ranjangpasien.index', compact('ranjangpasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ranjangpasien.create');
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
            'kode' => 'required|unique:ranjangpasien',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ranjangpasien = new RanjangPasien();
        $ranjangpasien->kode = $request->kode;
        $ranjangpasien->namaBarang = $request->namaBarang;
        $ranjangpasien->merk = $request->merk;
        $ranjangpasien->jumlah = $request->jumlah;
        $ranjangpasien->hargaSatuan = $request->hargaSatuan;
        $ranjangpasien->lokasi = $request->lokasi;
        $ranjangpasien->tahunPembuatan = $request->tahunPembuatan;
        $ranjangpasien->tahunBeli = $request->tahunBeli;
        $ranjangpasien->hargaKeseluruhan = $ranjangpasien->jumlah * $ranjangpasien->hargaSatuan;
        $ranjangpasien->kondisi = $request->kondisi;
        $ranjangpasien->save();
        return redirect()->route('ranjangpasien.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RanjangPasien  $ranjangPasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranjangpasien = RanjangPasien::findOrFail($id);
        return view('ranjangpasien.show', compact('ranjangpasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RanjangPasien  $ranjangPasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranjangpasien = RanjangPasien::findOrFail($id);
        return view('ranjangpasien.edit', compact('ranjangpasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RanjangPasien  $ranjangPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ranjangpasien',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ranjangpasien = RanjangPasien::findOrFail($id);
        $ranjangpasien->kode = $request->kode;
        $ranjangpasien->namaBarang = $request->namaBarang;
        $ranjangpasien->merk = $request->merk;
        $ranjangpasien->jumlah = $request->jumlah;
        $ranjangpasien->hargaSatuan = $request->hargaSatuan;
        $ranjangpasien->lokasi = $request->lokasi;
        $ranjangpasien->tahunPembuatan = $request->tahunPembuatan;
        $ranjangpasien->tahunBeli = $request->tahunBeli;
        $ranjangpasien->hargaKeseluruhan = $ranjangpasien->jumlah * $ranjangpasien->hargaSatuan;
        $ranjangpasien->kondisi = $request->kondisi;
        $ranjangpasien->save();
        return redirect()->route('ranjangpasien.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RanjangPasien  $ranjangPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ranjangpasien = RanjangPasien::findOrFail($id);
        $ranjangpasien->delete();
        return redirect()->route('ranjangpasien.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
