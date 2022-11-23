<?php

namespace App\Http\Controllers;

use App\Models\LayarInfocus;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class LayarInfocusController extends Controller
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
        $layarinfocus = Inventaris::where('namaBarang','LIKE BINARY','%layarinfocus%')->get();
        return view('layarinfocus.index', compact('layarinfocus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layarinfocus.create');
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
            'kode' => 'required|unique:layarinfocus',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $layarinfocus = new LayarInfocus();
        $layarinfocus->kode = $request->kode;
        $layarinfocus->namaBarang = $request->namaBarang;
        $layarinfocus->merk = $request->merk;
        $layarinfocus->jumlah = $request->jumlah;
        $layarinfocus->hargaSatuan = $request->hargaSatuan;
        $layarinfocus->lokasi = $request->lokasi;
        $layarinfocus->tahunPembuatan = $request->tahunPembuatan;
        $layarinfocus->tahunBeli = $request->tahunBeli;
        $layarinfocus->hargaKeseluruhan = $layarinfocus->jumlah * $layarinfocus->hargaSatuan;
        $layarinfocus->kondisi = $request->kondisi;
        $layarinfocus->save();
        return redirect()->route('layarinfocus.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayarInfocus  $layarInfocus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $layarinfocus = LayarInfocus::findOrFail($id);
        return view('layarinfocus.show', compact('layarinfocus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayarInfocus  $layarInfocus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layarinfocus = LayarInfocus::findOrFail($id);
        return view('layarinfocus.edit', compact('layarinfocus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayarInfocus  $layarInfocus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:layarinfocus',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $layarinfocus = LayarInfocus::findOrFail($id);
        $layarinfocus->kode = $request->kode;
        $layarinfocus->namaBarang = $request->namaBarang;
        $layarinfocus->merk = $request->merk;
        $layarinfocus->jumlah = $request->jumlah;
        $layarinfocus->hargaSatuan = $request->hargaSatuan;
        $layarinfocus->lokasi = $request->lokasi;
        $layarinfocus->tahunPembuatan = $request->tahunPembuatan;
        $layarinfocus->tahunBeli = $request->tahunBeli;
        $layarinfocus->hargaKeseluruhan = $layarinfocus->jumlah * $layarinfocus->hargaSatuan;
        $layarinfocus->kondisi = $request->kondisi;
        $layarinfocus->save();
        return redirect()->route('layarinfocus.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayarInfocus  $layarInfocus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layarinfocus = LayarInfocus::findOrFail($id);
        $layarinfocus->delete();
        return redirect()->route('layarinfocus.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
