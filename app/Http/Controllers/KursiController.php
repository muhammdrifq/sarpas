<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class KursiController extends Controller
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
        $kursi = Inventaris::where('namaBarang','LIKE BINARY','%Kursi%')->get();
        return view('kursi.index', compact('kursi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kursi.create');
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
            'kode' => 'required|unique:kursi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kursi = new Kursi();
        $kursi->kode = $request->kode;
        $kursi->namaBarang = $request->namaBarang;
        $kursi->merk = $request->merk;
        $kursi->jumlah = $request->jumlah;
        $kursi->hargaSatuan = $request->hargaSatuan;
        $kursi->lokasi = $request->lokasi;
        $kursi->tahunPembuatan = $request->tahunPembuatan;
        $kursi->tahunBeli = $request->tahunBeli;
        $kursi->hargaKeseluruhan = $kursi->jumlah * $kursi->hargaSatuan;
        $kursi->kondisi = $request->kondisi;
        $kursi->save();
        return redirect()->route('kursi.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kursi = Kursi::findOrFail($id);
        return view('kursi.show', compact('kursi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kursi = Kursi::findOrFail($id);
        return view('kursi.edit', compact('kursi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:kursi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kursi = Kursi::findOrFail($id);
        $kursi->kode = $request->kode;
        $kursi->namaBarang = $request->namaBarang;
        $kursi->merk = $request->merk;
        $kursi->jumlah = $request->jumlah;
        $kursi->hargaSatuan = $request->hargaSatuan;
        $kursi->lokasi = $request->lokasi;
        $kursi->tahunPembuatan = $request->tahunPembuatan;
        $kursi->tahunBeli = $request->tahunBeli;
        $kursi->hargaKeseluruhan = $kursi->jumlah * $kursi->hargaSatuan;
        $kursi->kondisi = $request->kondisi;
        $kursi->save();
        return redirect()->route('kursi.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kursi = Kursi::findOrFail($id);
        $kursi->delete();
        return redirect()->route('kursi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
