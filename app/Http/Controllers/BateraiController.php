<?php

namespace App\Http\Controllers;

use App\Models\Baterai;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BateraiController extends Controller
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
        $baterai = Inventaris::where('namaBarang','LIKE BINARY','%Baterai%')->get();
        return view('baterai.index', compact('baterai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baterai.create');
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
            'kode' => 'required|unique:baterai',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $baterai = new Baterai();
        $baterai->kode = $request->kode;
        $baterai->namaBarang = $request->namaBarang;
        $baterai->merk = $request->merk;
        $baterai->jumlah = $request->jumlah;
        $baterai->hargaSatuan = $request->hargaSatuan;
        $baterai->lokasi = $request->lokasi;
        $baterai->tahunPembuatan = $request->tahunPembuatan;
        $baterai->tahunBeli = $request->tahunBeli;
        $baterai->hargaKeseluruhan = $baterai->jumlah * $baterai->hargaSatuan;
        $baterai->kondisi = $request->kondisi;
        $baterai->save();
        return redirect()->route('baterai.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baterai  $baterai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baterai = Baterai::findOrFail($id);
        return view('baterai.show', compact('baterai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baterai  $baterai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baterai = Baterai::findOrFail($id);
        return view('baterai.edit', compact('baterai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baterai  $baterai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:baterai',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $baterai = Baterai::findOrFail($id);
        $baterai->kode = $request->kode;
        $baterai->namaBarang = $request->namaBarang;
        $baterai->merk = $request->merk;
        $baterai->jumlah = $request->jumlah;
        $baterai->hargaSatuan = $request->hargaSatuan;
        $baterai->lokasi = $request->lokasi;
        $baterai->tahunPembuatan = $request->tahunPembuatan;
        $baterai->tahunBeli = $request->tahunBeli;
        $baterai->hargaKeseluruhan = $baterai->jumlah * $baterai->hargaSatuan;
        $baterai->kondisi = $request->kondisi;
        $baterai->save();
        return redirect()->route('baterai.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baterai  $baterai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baterai = Baterai::findOrFail($id);
        $baterai->delete();
        return redirect()->route('baterai.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
