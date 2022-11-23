<?php

namespace App\Http\Controllers;

use App\Models\Torent;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TorentController extends Controller
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
        $torent = Inventaris::where('namaBarang','LIKE BINARY', '%torent%')->get();
        return view('torent.index', compact('torent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('torent.create');
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
            'kode' => 'required|unique:torent',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $torent = new Torent();
        $torent->kode = $request->kode;
        $torent->namaBarang = $request->namaBarang;
        $torent->merk = $request->merk;
        $torent->jumlah = $request->jumlah;
        $torent->hargaSatuan = $request->hargaSatuan;
        $torent->lokasi = $request->lokasi;
        $torent->tahunPembuatan = $request->tahunPembuatan;
        $torent->tahunBeli = $request->tahunBeli;
        $torent->hargaKeseluruhan = $torent->jumlah * $torent->hargaSatuan;
        $torent->kondisi = $request->kondisi;
        $torent->save();
        return redirect()->route('torent.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torent  $torent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torent = Torent::findOrFail($id);
        return view('torent.show', compact('torent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torent  $torent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torent = Torent::findOrFail($id);
        return view('torent.edit', compact('torent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torent  $torent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idi)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:torent',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $torent = Torent::findOrFail($id);
        $torent->kode = $request->kode;
        $torent->namaBarang = $request->namaBarang;
        $torent->merk = $request->merk;
        $torent->jumlah = $request->jumlah;
        $torent->hargaSatuan = $request->hargaSatuan;
        $torent->lokasi = $request->lokasi;
        $torent->tahunPembuatan = $request->tahunPembuatan;
        $torent->tahunBeli = $request->tahunBeli;
        $torent->hargaKeseluruhan = $torent->jumlah * $torent->hargaSatuan;
        $torent->kondisi = $request->kondisi;
        $torent->save();
        return redirect()->route('torent.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torent  $torent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torent = Torent::findOrFail($id);
        $torent->delete();
        return redirect()->route('torent.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
