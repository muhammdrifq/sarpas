<?php

namespace App\Http\Controllers;

use App\Models\CCTV;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class CCTVController extends Controller
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
        $cctv = Inventaris::where('namaBarang','LIKE BINARY','%CCTV%')->get();
        return view('cctv.index', compact('cctv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cctv.create');
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
            'kode' => 'required|unique:cctv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cctv = new CCTV();
        $cctv->kode = $request->kode;
        $cctv->namaBarang = $request->namaBarang;
        $cctv->merk = $request->merk;
        $cctv->jumlah = $request->jumlah;
        $cctv->hargaSatuan = $request->hargaSatuan;
        $cctv->lokasi = $request->lokasi;
        $cctv->tahunPembuatan = $request->tahunPembuatan;
        $cctv->tahunBeli = $request->tahunBeli;
        $cctv->hargaKeseluruhan = $cctv->jumlah * $cctv->hargaSatuan;
        $cctv->kondisi = $request->kondisi;
        $cctv->save();
        return redirect()->route('cctv.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CCTV  $cCTV
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cctv = CCTV::findOrFail($id);
        return view('cctv.show', compact('cctv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CCTV  $cCTV
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cctv = CCTV::findOrFail($id);
        return view('cctv.edit', compact('cctv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CCTV  $cCTV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:cctv',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cctv = CCTV::findOrFail($id);
        $cctv->kode = $request->kode;
        $cctv->namaBarang = $request->namaBarang;
        $cctv->merk = $request->merk;
        $cctv->jumlah = $request->jumlah;
        $cctv->hargaSatuan = $request->hargaSatuan;
        $cctv->lokasi = $request->lokasi;
        $cctv->tahunPembuatan = $request->tahunPembuatan;
        $cctv->tahunBeli = $request->tahunBeli;
        $cctv->hargaKeseluruhan = $cctv->jumlah * $cctv->hargaSatuan;
        $cctv->kondisi = $request->kondisi;
        $cctv->save();
        return redirect()->route('cctv.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CCTV  $cCTV
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cctv = CCTV::findOrFail($id);
        $cctv->delete();
        return redirect()->route('cctv.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
