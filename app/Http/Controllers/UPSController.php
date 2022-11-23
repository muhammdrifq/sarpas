<?php

namespace App\Http\Controllers;

use App\Models\UPS;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class UPSController extends Controller
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
        $ups = Inventaris::where('namaBarang','LIKE BINARY', '%UPS%')->get();
        return view('ups.index', compact('ups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ups.create');
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
            'kode' => 'required|unique:ups',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ups = new UPS();
        $ups->kode = $request->kode;
        $ups->namaBarang = $request->namaBarang;
        $ups->merk = $request->merk;
        $ups->jumlah = $request->jumlah;
        $ups->hargaSatuan = $request->hargaSatuan;
        $ups->lokasi = $request->lokasi;
        $ups->tahunPembuatan = $request->tahunPembuatan;
        $ups->tahunBeli = $request->tahunBeli;
        $ups->hargaKeseluruhan = $ups->jumlah * $ups->hargaSatuan;
        $ups->kondisi = $request->kondisi;
        $ups->save();
        return redirect()->route('ups.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UPS  $uPS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ups = UPS::findOrFail($id);
        return view('ups.show', compact('ups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UPS  $uPS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ups = UPS::findOrFail($id);
        return view('ups.edit', compact('ups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UPS  $uPS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ups',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ups = UPS::findOrFail($id);
        $ups->kode = $request->kode;
        $ups->namaBarang = $request->namaBarang;
        $ups->merk = $request->merk;
        $ups->jumlah = $request->jumlah;
        $ups->hargaSatuan = $request->hargaSatuan;
        $ups->lokasi = $request->lokasi;
        $ups->tahunPembuatan = $request->tahunPembuatan;
        $ups->tahunBeli = $request->tahunBeli;
        $ups->hargaKeseluruhan = $ups->jumlah * $ups->hargaSatuan;
        $ups->kondisi = $request->kondisi;
        $ups->save();
        return redirect()->route('ups.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UPS  $uPS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ups = UPS::findOrFail($id);
        $ups->delete();
        return redirect()->route('ups.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
