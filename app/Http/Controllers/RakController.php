<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class RakController extends Controller
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
        $rak = Inventaris::where('namaBarang','LIKE BINARY', '%Rak%')->get();
        return view('rak.index', compact('rak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rak.create');
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
            'kode' => 'required|unique:rak',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $rak = new Rak();
        $rak->kode = $request->kode;
        $rak->namaBarang = $request->namaBarang;
        $rak->merk = $request->merk;
        $rak->jumlah = $request->jumlah;
        $rak->hargaSatuan = $request->hargaSatuan;
        $rak->lokasi = $request->lokasi;
        $rak->tahunPembuatan = $request->tahunPembuatan;
        $rak->tahunBeli = $request->tahunBeli;
        $rak->hargaKeseluruhan = $rak->jumlah * $rak->hargaSatuan;
        $rak->kondisi = $request->kondisi;
        $rak->save();
        return redirect()->route('rak.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rak = Rak::findOrFail($id);
        return view('rak.show', compact('rak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rak = Rak::findOrFail($id);
        return view('rak.edit', compact('rak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:rak',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $rak = Rak::findOrFail($id);
        $rak->kode = $request->kode;
        $rak->namaBarang = $request->namaBarang;
        $rak->merk = $request->merk;
        $rak->jumlah = $request->jumlah;
        $rak->hargaSatuan = $request->hargaSatuan;
        $rak->lokasi = $request->lokasi;
        $rak->tahunPembuatan = $request->tahunPembuatan;
        $rak->tahunBeli = $request->tahunBeli;
        $rak->hargaKeseluruhan = $rak->jumlah * $rak->hargaSatuan;
        $rak->kondisi = $request->kondisi;
        $rak->save();
        return redirect()->route('rak.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        return redirect()->route('rak.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
