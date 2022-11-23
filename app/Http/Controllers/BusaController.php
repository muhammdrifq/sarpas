<?php

namespace App\Http\Controllers;

use App\Models\Busa;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BusaController extends Controller
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
        $busa = Inventaris::where('namaBarang','LIKE BINARY','%Busa%')->get();
        return view('busa.index', compact('busa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('busa.create');
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
            'kode' => 'required|unique:busa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $busa = new Busa();
        $busa->kode = $request->kode;
        $busa->namaBarang = $request->namaBarang;
        $busa->merk = $request->merk;
        $busa->jumlah = $request->jumlah;
        $busa->hargaSatuan = $request->hargaSatuan;
        $busa->lokasi = $request->lokasi;
        $busa->tahunPembuatan = $request->tahunPembuatan;
        $busa->tahunBeli = $request->tahunBeli;
        $busa->hargaKeseluruhan = $busa->jumlah * $busa->hargaSatuan;
        $busa->kondisi = $request->kondisi;
        $busa->save();
        return redirect()->route('busa.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Busa  $busa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $busa = Busa::findOrFail($id);
        return view('busa.show', compact('busa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Busa  $busa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $busa = Busa::findOrFail($id);
        return view('busa.edit', compact('busa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Busa  $busa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:busa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $busa = Busa::findOrFail($id);
        $busa->kode = $request->kode;
        $busa->namaBarang = $request->namaBarang;
        $busa->merk = $request->merk;
        $busa->jumlah = $request->jumlah;
        $busa->hargaSatuan = $request->hargaSatuan;
        $busa->lokasi = $request->lokasi;
        $busa->tahunPembuatan = $request->tahunPembuatan;
        $busa->tahunBeli = $request->tahunBeli;
        $busa->hargaKeseluruhan = $busa->jumlah * $busa->hargaSatuan;
        $busa->kondisi = $request->kondisi;
        $busa->save();
        return redirect()->route('busa.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Busa  $busa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busa = Busa::findOrFail($id);
        $busa->delete();
        return redirect()->route('busa.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
