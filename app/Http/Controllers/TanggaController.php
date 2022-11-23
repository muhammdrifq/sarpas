<?php

namespace App\Http\Controllers;

use App\Models\Tangga;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TanggaController extends Controller
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
        $tangga = Inventaris::where('namaBarang','LIKE BINARY', '%Tangga%')->get();
        return view('tangga.index', compact('tangga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tangga.create');
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
            'kode' => 'required|unique:tangga',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tangga = new Tangga();
        $tangga->kode = $request->kode;
        $tangga->namaBarang = $request->namaBarang;
        $tangga->merk = $request->merk;
        $tangga->jumlah = $request->jumlah;
        $tangga->hargaSatuan = $request->hargaSatuan;
        $tangga->lokasi = $request->lokasi;
        $tangga->tahunPembuatan = $request->tahunPembuatan;
        $tangga->tahunBeli = $request->tahunBeli;
        $tangga->hargaKeseluruhan = $tangga->jumlah * $tangga->hargaSatuan;
        $tangga->kondisi = $request->kondisi;
        $tangga->save();
        return redirect()->route('tangga.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tangga  $tangga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tangga = Tangga::findOrFail($id);
        return view('tangga.show', compact('tangga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tangga  $tangga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tangga = Tangga::findOrFail($id);
        return view('tangga.edit', compact('tangga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tangga  $tangga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tangga',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tangga = Tangga::findOrFail($id);
        $tangga->kode = $request->kode;
        $tangga->namaBarang = $request->namaBarang;
        $tangga->merk = $request->merk;
        $tangga->jumlah = $request->jumlah;
        $tangga->hargaSatuan = $request->hargaSatuan;
        $tangga->lokasi = $request->lokasi;
        $tangga->tahunPembuatan = $request->tahunPembuatan;
        $tangga->tahunBeli = $request->tahunBeli;
        $tangga->hargaKeseluruhan = $tangga->jumlah * $tangga->hargaSatuan;
        $tangga->kondisi = $request->kondisi;
        $tangga->save();
        return redirect()->route('tangga.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tangga  $tangga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tangga = Tangga::findOrFail($id);
        $tangga->delete();
        return redirect()->route('tangga.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
