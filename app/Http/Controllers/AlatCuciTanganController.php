<?php

namespace App\Http\Controllers;

use App\Models\AlatCuciTangan;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class AlatCuciTanganController extends Controller
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
        $alatCuciTangan = Inventaris::where('namaBarang','LIKE BINARY','%Alat Cuci Tangan%')->get();
        return view('alatCuciTangan.index', compact('alatCuciTangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alatCuciTangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'kode' => 'required|unique:alatCuciTangan',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $alatCuciTangan = new AlatCuciTangan();
        $alatCuciTangan->kode = $request->kode;
        $alatCuciTangan->namaBarang = $request->namaBarang;
        $alatCuciTangan->merk = $request->merk;
        $alatCuciTangan->jumlah = $request->jumlah;
        $alatCuciTangan->hargaSatuan = $request->hargaSatuan;
        $alatCuciTangan->lokasi = $request->lokasi;
        $alatCuciTangan->tahunPembuatan = $request->tahunPembuatan;
        $alatCuciTangan->tahunBeli = $request->tahunBeli;
        $alatCuciTangan->hargaKeseluruhan = $alatCuciTangan->jumlah * $alatCuciTangan->hargaSatuan;
        $alatCuciTangan->kondisi = $request->kondisi;
        $alatCuciTangan->save();
        return redirect()->route('alatCuciTangan.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlatCuciTangan  $alatCuciTangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alatCuciTangan = AlatCuciTangan::findOrFail($id);
        return view('alatCuciTangan.show', compact('alatCuciTangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlatCuciTangan  $alatCuciTangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alatCuciTangan = AlatCuciTangan::findOrFail($id);
        return view('alatCuciTangan.edit', compact('alatCuciTangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlatCuciTangan  $alatCuciTangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:alatCuciTangan',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $alatCuciTangan = AlatCuciTangan::findOrFail($id);
        $alatCuciTangan->kode = $request->kode;
        $alatCuciTangan->namaBarang = $request->namaBarang;
        $alatCuciTangan->merk = $request->merk;
        $alatCuciTangan->jumlah = $request->jumlah;
        $alatCuciTangan->hargaSatuan = $request->hargaSatuan;
        $alatCuciTangan->lokasi = $request->lokasi;
        $alatCuciTangan->tahunPembuatan = $request->tahunPembuatan;
        $alatCuciTangan->tahunBeli = $request->tahunBeli;
        $alatCuciTangan->hargaKeseluruhan = $alatCuciTangan->jumlah * $alatCuciTangan->hargaSatuan;
        $alatCuciTangan->kondisi = $request->kondisi;
        $alatCuciTangan->save();
        return redirect()->route('alatCuciTangan.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlatCuciTangan  $alatCuciTangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alatCuciTangan = AlatCuciTangan::findOrFail($id);
        $alatCuciTangan->delete();
        return redirect()->route('alatCuciTangan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
