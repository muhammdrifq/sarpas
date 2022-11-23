<?php

namespace App\Http\Controllers;

use App\Models\AnyCast;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class AnyCastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $anycast = Inventaris::where('namaBarang','LIKE BINARY','%Any Cast%')->get();
        return view('anycast.index', compact('anycast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anycast.create');
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
            'kode' => 'required|unique:anycast',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $anycast = new Anycast();
        $anycast->kode = $request->kode;
        $anycast->namaBarang = $request->namaBarang;
        $anycast->merk = $request->merk;
        $anycast->jumlah = $request->jumlah;
        $anycast->hargaSatuan = $request->hargaSatuan;
        $anycast->lokasi = $request->lokasi;
        $anycast->tahunPembuatan = $request->tahunPembuatan;
        $anycast->tahunBeli = $request->tahunBeli;
        $anycast->hargaKeseluruhan = $anycast->jumlah * $anycast->hargaSatuan;
        $anycast->kondisi = $request->kondisi;
        $anycast->save();
        return redirect()->route('anycast.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnyCast  $anyCast
     * @return \Illuminate\Http\Response
     */
    public function show(   $id)
    {
        $anycast = Anycast::findOrFail($id);
        return view('anycast.show', compact('anycast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnyCast  $anyCast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anycast = Anycast::findOrFail($id);
        return view('anycast.edit', compact('anycast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnyCast  $anyCast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:anycast',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $anycast = Anycast::findOrFail($id);
        $anycast->kode = $request->kode;
        $anycast->namaBarang = $request->namaBarang;
        $anycast->merk = $request->merk;
        $anycast->jumlah = $request->jumlah;
        $anycast->hargaSatuan = $request->hargaSatuan;
        $anycast->lokasi = $request->lokasi;
        $anycast->tahunPembuatan = $request->tahunPembuatan;
        $anycast->tahunBeli = $request->tahunBeli;
        $anycast->hargaKeseluruhan = $anycast->jumlah * $anycast->hargaSatuan;
        $anycast->kondisi = $request->kondisi;
        $anycast->save();
        return redirect()->route('anycast.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnyCast  $anyCast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anycast = Anycast::findOrFail($id);
        $anycast->delete();
        return redirect()->route('anycast.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
