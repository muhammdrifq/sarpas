<?php

namespace App\Http\Controllers;

use App\Models\Lemari;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class LemariController extends Controller
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
        $lemari = Inventaris::where('namaBarang','LIKE BINARY','%lemari%')->get();
        return view('lemari.index', compact('lemari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lemari.create');
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
            'kode' => 'required|unique:lemari',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lemari = new Lemari();
        $lemari->kode = $request->kode;
        $lemari->namaBarang = $request->namaBarang;
        $lemari->merk = $request->merk;
        $lemari->jumlah = $request->jumlah;
        $lemari->hargaSatuan = $request->hargaSatuan;
        $lemari->lokasi = $request->lokasi;
        $lemari->tahunPembuatan = $request->tahunPembuatan;
        $lemari->tahunBeli = $request->tahunBeli;
        $lemari->hargaKeseluruhan = $lemari->jumlah * $lemari->hargaSatuan;
        $lemari->kondisi = $request->kondisi;
        $lemari->save();
        return redirect()->route('lemari.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lemari  $lemari
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lemari =lemari::findOrFail($id);
        return view('lemari.show', compact('lemari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lemari  $lemari
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lemari =lemari::findOrFail($id);
        return view('lemari.edit', compact('lemari'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lemari  $lemari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lemari',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lemari =lemari::findOrFail($id);
        $lemari->kode = $request->kode;
        $lemari->namaBarang = $request->namaBarang;
        $lemari->merk = $request->merk;
        $lemari->jumlah = $request->jumlah;
        $lemari->hargaSatuan = $request->hargaSatuan;
        $lemari->lokasi = $request->lokasi;
        $lemari->tahunPembuatan = $request->tahunPembuatan;
        $lemari->tahunBeli = $request->tahunBeli;
        $lemari->hargaKeseluruhan = $lemari->jumlah * $lemari->hargaSatuan;
        $lemari->kondisi = $request->kondisi;
        $lemari->save();
        return redirect()->route('lemari.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lemari  $lemari
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lemari = Lemari::findOrFail($id);
        $lemari->delete();
        return redirect()->route('lemari.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
