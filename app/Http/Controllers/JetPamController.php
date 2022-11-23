<?php

namespace App\Http\Controllers;

use App\Models\JetPam;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class JetPamController extends Controller
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
        $jetpam = Inventaris::where('namaBarang','LIKE BINARY','%Jetpam%')->get();
        return view('jetpam.index', compact('jetpam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jetpam.create');
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
            'kode' => 'required|unique:jetpam',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jetpam = new Jetpam();
        $jetpam->kode = $request->kode;
        $jetpam->namaBarang = $request->namaBarang;
        $jetpam->merk = $request->merk;
        $jetpam->jumlah = $request->jumlah;
        $jetpam->hargaSatuan = $request->hargaSatuan;
        $jetpam->lokasi = $request->lokasi;
        $jetpam->tahunPembuatan = $request->tahunPembuatan;
        $jetpam->tahunBeli = $request->tahunBeli;
        $jetpam->hargaKeseluruhan = $jetpam->jumlah * $jetpam->hargaSatuan;
        $jetpam->kondisi = $request->kondisi;
        $jetpam->save();
        return redirect()->route('jetpam.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JetPam  $jetPam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jetpam = Jetpam::findOrFail($id);
        return view('jetpam.show', compact('jetpam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JetPam  $jetPam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jetpam = Jetpam::findOrFail($id);
        return view('jetpam.edit', compact('jetpam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JetPam  $jetPam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jetpam',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jetpam = Jetpam::findOrFail($id);
        $jetpam->kode = $request->kode;
        $jetpam->namaBarang = $request->namaBarang;
        $jetpam->merk = $request->merk;
        $jetpam->jumlah = $request->jumlah;
        $jetpam->hargaSatuan = $request->hargaSatuan;
        $jetpam->lokasi = $request->lokasi;
        $jetpam->tahunPembuatan = $request->tahunPembuatan;
        $jetpam->tahunBeli = $request->tahunBeli;
        $jetpam->hargaKeseluruhan = $jetpam->jumlah * $jetpam->hargaSatuan;
        $jetpam->kondisi = $request->kondisi;
        $jetpam->save();
        return redirect()->route('jetpam.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JetPam  $jetPam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jetpam = Jetpam::findOrFail($id);
        $jetpam->delete();
        return redirect()->route('jetpam.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
