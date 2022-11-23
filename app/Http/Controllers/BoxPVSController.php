<?php

namespace App\Http\Controllers;

use App\Models\BoxPVS;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BoxPVSController extends Controller
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
        $boxpvs = Inventaris::where('namaBarang','LIKE BINARY','%Box PVC%')->get();
        return view('boxpvs.index', compact('boxpvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boxpvs.create');
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
            'kode' => 'required|unique:boxpvs',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $boxpvs = new Boxpvs();
        $boxpvs->kode = $request->kode;
        $boxpvs->namaBarang = $request->namaBarang;
        $boxpvs->merk = $request->merk;
        $boxpvs->jumlah = $request->jumlah;
        $boxpvs->hargaSatuan = $request->hargaSatuan;
        $boxpvs->lokasi = $request->lokasi;
        $boxpvs->tahunPembuatan = $request->tahunPembuatan;
        $boxpvs->tahunBeli = $request->tahunBeli;
        $boxpvs->hargaKeseluruhan = $boxpvs->jumlah * $boxpvs->hargaSatuan;
        $boxpvs->kondisi = $request->kondisi;
        $boxpvs->save();
        return redirect()->route('boxpvs.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoxPVS  $boxPVS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boxpvs = Boxpvs::findOrFail($id);
        return view('boxpvs.show', compact('boxpvs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoxPVS  $boxPVS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boxpvs = Boxpvs::findOrFail($id);
        return view('boxpvs.edit', compact('boxpvs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoxPVS  $boxPVS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:boxpvs',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $boxpvs = Boxpvs::findOrFail($id);
        $boxpvs->kode = $request->kode;
        $boxpvs->namaBarang = $request->namaBarang;
        $boxpvs->merk = $request->merk;
        $boxpvs->jumlah = $request->jumlah;
        $boxpvs->hargaSatuan = $request->hargaSatuan;
        $boxpvs->lokasi = $request->lokasi;
        $boxpvs->tahunPembuatan = $request->tahunPembuatan;
        $boxpvs->tahunBeli = $request->tahunBeli;
        $boxpvs->hargaKeseluruhan = $boxpvs->jumlah * $boxpvs->hargaSatuan;
        $boxpvs->kondisi = $request->kondisi;
        $boxpvs->save();
        return redirect()->route('boxpvs.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoxPVS  $boxPVS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boxpvs = Boxpvs::findOrFail($id);
        $boxpvs->delete();
        return redirect()->route('boxpvs.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
