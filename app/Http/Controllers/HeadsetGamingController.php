<?php

namespace App\Http\Controllers;

use App\Models\HeadsetGaming;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class HeadsetGamingController extends Controller
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
        $headsetgaming = Inventaris::where('namaBarang','LIKE BINARY','%headsetgaming%')->get();
        return view('headsetgaming.index', compact('headsetgaming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headsetgaming.create');
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
            'kode' => 'required|unique:headsetgaming',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $headsetgaming = new HeadsetGaming();
        $headsetgaming->kode = $request->kode;
        $headsetgaming->namaBarang = $request->namaBarang;
        $headsetgaming->merk = $request->merk;
        $headsetgaming->jumlah = $request->jumlah;
        $headsetgaming->hargaSatuan = $request->hargaSatuan;
        $headsetgaming->lokasi = $request->lokasi;
        $headsetgaming->tahunPembuatan = $request->tahunPembuatan;
        $headsetgaming->tahunBeli = $request->tahunBeli;
        $headsetgaming->hargaKeseluruhan = $headsetgaming->jumlah * $headsetgaming->hargaSatuan;
        $headsetgaming->kondisi = $request->kondisi;
        $headsetgaming->save();
        return redirect()->route('headsetgaming.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeadsetGaming  $headsetGaming
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $headsetgaming = HeadsetGaming::findOrFail($id);
        return view('headsetgaming.show', compact('headsetgaming'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeadsetGaming  $headsetGaming
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $headsetgaming = HeadsetGaming::findOrFail($id);
        return view('headsetgaming.edit', compact('headsetgaming'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeadsetGaming  $headsetGaming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:headsetgaming',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $headsetgaming = HeadsetGaming::findOrFail($id);
        $headsetgaming->kode = $request->kode;
        $headsetgaming->namaBarang = $request->namaBarang;
        $headsetgaming->merk = $request->merk;
        $headsetgaming->jumlah = $request->jumlah;
        $headsetgaming->hargaSatuan = $request->hargaSatuan;
        $headsetgaming->lokasi = $request->lokasi;
        $headsetgaming->tahunPembuatan = $request->tahunPembuatan;
        $headsetgaming->tahunBeli = $request->tahunBeli;
        $headsetgaming->hargaKeseluruhan = $headsetgaming->jumlah * $headsetgaming->hargaSatuan;
        $headsetgaming->kondisi = $request->kondisi;
        $headsetgaming->save();
        return redirect()->route('headsetgaming.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeadsetGaming  $headsetGaming
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headsetgaming = HeadsetGaming::findOrFail($id);
        $headsetgaming->delete();
        return redirect()->route('headsetgaming.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
