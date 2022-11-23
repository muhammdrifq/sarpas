<?php

namespace App\Http\Controllers;

use App\Models\Karpet;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class KarpetController extends Controller
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
        $karpet = Inventaris::where('namaBarang','LIKE BINARY','%Karpet%')->get();
        return view('karpet.index', compact('karpet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karpet.create');
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
            'kode' => 'required|unique:karpet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $karpet = new Karpet();
        $karpet->kode = $request->kode;
        $karpet->namaBarang = $request->namaBarang;
        $karpet->merk = $request->merk;
        $karpet->jumlah = $request->jumlah;
        $karpet->hargaSatuan = $request->hargaSatuan;
        $karpet->lokasi = $request->lokasi;
        $karpet->tahunPembuatan = $request->tahunPembuatan;
        $karpet->tahunBeli = $request->tahunBeli;
        $karpet->hargaKeseluruhan = $karpet->jumlah * $karpet->hargaSatuan;
        $karpet->kondisi = $request->kondisi;
        $karpet->save();
        return redirect()->route('karpet.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karpet  $karpet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karpet = Karpet::findOrFail($id);
        return view('karpet.show', compact('karpet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karpet  $karpet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karpet = Karpet::findOrFail($id);
        return view('karpet.edit', compact('karpet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karpet  $karpet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:karpet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $karpet = Karpet::findOrFail($id);
        $karpet->kode = $request->kode;
        $karpet->namaBarang = $request->namaBarang;
        $karpet->merk = $request->merk;
        $karpet->jumlah = $request->jumlah;
        $karpet->hargaSatuan = $request->hargaSatuan;
        $karpet->lokasi = $request->lokasi;
        $karpet->tahunPembuatan = $request->tahunPembuatan;
        $karpet->tahunBeli = $request->tahunBeli;
        $karpet->hargaKeseluruhan = $karpet->jumlah * $karpet->hargaSatuan;
        $karpet->kondisi = $request->kondisi;
        $karpet->save();
        return redirect()->route('karpet.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karpet  $karpet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karpet = Karpet::findOrFail($id);
        $karpet->delete();
        return redirect()->route('karpet.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
