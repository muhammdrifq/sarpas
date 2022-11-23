<?php

namespace App\Http\Controllers;

use App\Models\HT;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class HTController extends Controller
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
        $ht = Inventaris::where('namaBarang','LIKE BINARY','%HT%')->get();
        return view('ht.index', compact('ht'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ht.create');
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
            'kode' => 'required|unique:ht',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ht = new HT();
        $ht->kode = $request->kode;
        $ht->namaBarang = $request->namaBarang;
        $ht->merk = $request->merk;
        $ht->jumlah = $request->jumlah;
        $ht->hargaSatuan = $request->hargaSatuan;
        $ht->lokasi = $request->lokasi;
        $ht->tahunPembuatan = $request->tahunPembuatan;
        $ht->tahunBeli = $request->tahunBeli;
        $ht->hargaKeseluruhan = $ht->jumlah * $ht->hargaSatuan;
        $ht->kondisi = $request->kondisi;
        $ht->save();
        return redirect()->route('ht.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HT  $hT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ht = HT::findOrFail($id);
        return view('ht.show', compact('ht'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HT  $hT
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ht = HT::findOrFail($id);
        return view('ht.edit', compact('ht'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HT  $hT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ht',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ht = HT::findOrFail($id);
        $ht->kode = $request->kode;
        $ht->namaBarang = $request->namaBarang;
        $ht->merk = $request->merk;
        $ht->jumlah = $request->jumlah;
        $ht->hargaSatuan = $request->hargaSatuan;
        $ht->lokasi = $request->lokasi;
        $ht->tahunPembuatan = $request->tahunPembuatan;
        $ht->tahunBeli = $request->tahunBeli;
        $ht->hargaKeseluruhan = $ht->jumlah * $ht->hargaSatuan;
        $ht->kondisi = $request->kondisi;
        $ht->save();
        return redirect()->route('ht.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HT  $hT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ht = HT::findOrFail($id);
        $ht->delete();
        return redirect()->route('ht.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
