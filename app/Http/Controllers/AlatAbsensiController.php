<?php

namespace App\Http\Controllers;

use App\Models\AlatAbsensi;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class AlatAbsensiController extends Controller
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
        //menampilkan semua data dari model absensi
        $alatAbsensi = Inventaris::where('namaBarang','LIKE BINARY','%Alat Absensi Finger Print%')->get();
        return view('alatAbsensi.index', compact('alatAbsensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alatAbsensi.create');
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
            'kode' => 'required|unique:alatAbsensi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $alatAbsensi = new AlatAbsensi();
        $alatAbsensi->kode = $request->kode;
        $alatAbsensi->namaBarang = $request->namaBarang;
        $alatAbsensi->merk = $request->merk;
        $alatAbsensi->jumlah = $request->jumlah;
        $alatAbsensi->hargaSatuan = $request->hargaSatuan;
        $alatAbsensi->lokasi = $request->lokasi;
        $alatAbsensi->tahunPembuatan = $request->tahunPembuatan;
        $alatAbsensi->tahunBeli = $request->tahunBeli;
        $alatAbsensi->hargaKeseluruhan = $alatAbsensi->jumlah * $alatAbsensi->hargaSatuan;
        $alatAbsensi->kondisi = $request->kondisi;
        $alatAbsensi->save();
        return redirect()->route('alatAbsensi.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlatAbsensi  $alatAbsensi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alatAbsensi = AlatAbsensi::findOrFail($id);
        return view('alatAbsensi.show', compact('alatAbsensi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlatAbsensi  $alatAbsensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alatAbsensi = AlatAbsensi::findOrFail($id);
        return view('alatAbsensi.edit', compact('alatAbsensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlatAbsensi  $alatAbsensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:alatAbsensi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $alatAbsensi = AlatAbsensi::findOrFail($id);
        $alatAbsensi->kode = $request->kode;
        $alatAbsensi->namaBarang = $request->namaBarang;
        $alatAbsensi->merk = $request->merk;
        $alatAbsensi->jumlah = $request->jumlah;
        $alatAbsensi->hargaSatuan = $request->hargaSatuan;
        $alatAbsensi->lokasi = $request->lokasi;
        $alatAbsensi->tahunPembuatan = $request->tahunPembuatan;
        $alatAbsensi->tahunBeli = $request->tahunBeli;
        $alatAbsensi->hargaKeseluruhan = $alatAbsensi->jumlah * $alatAbsensi->hargaSatuan;
        $alatAbsensi->kondisi = $request->kondisi;
        $alatAbsensi->save();
        return redirect()->route('alatAbsensi.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlatAbsensi  $alatAbsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alatAbsensi = AlatAbsensi::findOrFail($id);
        $alatAbsensi->delete();
        return redirect()->route('alatAbsensi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
