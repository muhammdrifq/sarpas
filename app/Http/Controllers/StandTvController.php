<?php

namespace App\Http\Controllers;

use App\Models\StandTv;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class StandTvController extends Controller
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
        $standtv = Inventaris::where('namaBarang','LIKE BINARY', '%standtv%')->get();
        return view('standtv.index', compact('standtv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('standtv.create');
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
            'kode' => 'required|unique:standtv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $standtv = new StandTv();
        $standtv->kode = $request->kode;
        $standtv->namaBarang = $request->namaBarang;
        $standtv->merk = $request->merk;
        $standtv->jumlah = $request->jumlah;
        $standtv->hargaSatuan = $request->hargaSatuan;
        $standtv->lokasi = $request->lokasi;
        $standtv->tahunPembuatan = $request->tahunPembuatan;
        $standtv->tahunBeli = $request->tahunBeli;
        $standtv->hargaKeseluruhan = $standtv->jumlah * $standtv->hargaSatuan;
        $standtv->kondisi = $request->kondisi;
        $standtv->save();
        return redirect()->route('standtv.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandTv  $standTv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $standtv = StandTv::findOrFail($id);
        return view('standtv.show', compact('standtv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandTv  $standTv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standtv = StandTv::findOrFail($id);
        return view('standtv.edit', compact('standtv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandTv  $standTv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:standtv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $standtv = StandTv::findOrFail($id);
        $standtv->kode = $request->kode;
        $standtv->namaBarang = $request->namaBarang;
        $standtv->merk = $request->merk;
        $standtv->jumlah = $request->jumlah;
        $standtv->hargaSatuan = $request->hargaSatuan;
        $standtv->lokasi = $request->lokasi;
        $standtv->tahunPembuatan = $request->tahunPembuatan;
        $standtv->tahunBeli = $request->tahunBeli;
        $standtv->hargaKeseluruhan = $standtv->jumlah * $standtv->hargaSatuan;
        $standtv->kondisi = $request->kondisi;
        $standtv->save();
        return redirect()->route('standtv.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandTv  $standTv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $standtv = StandTv::findOrFail($id);
        $standtv->delete();
        return redirect()->route('standtv.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
