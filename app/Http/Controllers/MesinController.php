<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MesinController extends Controller
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
        $mesin = Inventaris::where('namaBarang','LIKE BINARY', '%mesin%')->get();
        return view('mesin.index', compact('mesin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesin.create');
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
            'kode' => 'required|unique:mesin',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mesin = new Mesin();
        $mesin->kode = $request->kode;
        $mesin->namaBarang = $request->namaBarang;
        $mesin->merk = $request->merk;
        $mesin->jumlah = $request->jumlah;
        $mesin->hargaSatuan = $request->hargaSatuan;
        $mesin->lokasi = $request->lokasi;
        $mesin->tahunPembuatan = $request->tahunPembuatan;
        $mesin->tahunBeli = $request->tahunBeli;
        $mesin->hargaKeseluruhan = $mesin->jumlah * $mesin->hargaSatuan;
        $mesin->kondisi = $request->kondisi;
        $mesin->save();
        return redirect()->route('mesin.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesin =Mesin::findOrFail($id);
        return view('mesin.show', compact('mesin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesin =Mesin::findOrFail($id);
        return view('mesin.edit', compact('mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mesin',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mesin =Mesin::findOrFail($id);
        $mesin->kode = $request->kode;
        $mesin->namaBarang = $request->namaBarang;
        $mesin->merk = $request->merk;
        $mesin->jumlah = $request->jumlah;
        $mesin->hargaSatuan = $request->hargaSatuan;
        $mesin->lokasi = $request->lokasi;
        $mesin->tahunPembuatan = $request->tahunPembuatan;
        $mesin->tahunBeli = $request->tahunBeli;
        $mesin->hargaKeseluruhan = $mesin->jumlah * $mesin->hargaSatuan;
        $mesin->kondisi = $request->kondisi;
        $mesin->save();
        return redirect()->route('mesin.index')
            ->with('success', 'Data berhasil diedit!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesin = Mesin::findOrFail($id);
        $mesin->delete();
        return redirect()->route('mesin.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
