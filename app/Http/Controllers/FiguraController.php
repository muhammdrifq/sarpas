<?php

namespace App\Http\Controllers;

use App\Models\Figura;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class FiguraController extends Controller
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
        $figura = Inventaris::where('namaBarang','LIKE BINARY','%Figura%')->get();
        return view('figura.index', compact('figura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('figura.create');
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
            'kode' => 'required|unique:figura',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $figura = new Figura();
        $figura->kode = $request->kode;
        $figura->namaBarang = $request->namaBarang;
        $figura->merk = $request->merk;
        $figura->jumlah = $request->jumlah;
        $figura->hargaSatuan = $request->hargaSatuan;
        $figura->lokasi = $request->lokasi;
        $figura->tahunPembuatan = $request->tahunPembuatan;
        $figura->tahunBeli = $request->tahunBeli;
        $figura->hargaKeseluruhan = $figura->jumlah * $figura->hargaSatuan;
        $figura->kondisi = $request->kondisi;
        $figura->save();
        return redirect()->route('figura.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Figura  $figura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $figura = Figura::findOrFail($id);
        return view('figura.show', compact('figura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Figura  $figura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $figura = Figura::findOrFail($id);
        return view('figura.edit', compact('figura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Figura  $figura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:figura',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $figura = Figura::findOrFail($id);
        $figura->kode = $request->kode;
        $figura->namaBarang = $request->namaBarang;
        $figura->merk = $request->merk;
        $figura->jumlah = $request->jumlah;
        $figura->hargaSatuan = $request->hargaSatuan;
        $figura->lokasi = $request->lokasi;
        $figura->tahunPembuatan = $request->tahunPembuatan;
        $figura->tahunBeli = $request->tahunBeli;
        $figura->hargaKeseluruhan = $figura->jumlah * $figura->hargaSatuan;
        $figura->kondisi = $request->kondisi;
        $figura->save();
        return redirect()->route('figura.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Figura  $figura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $figura = Figura::findOrFail($id);
        $figura->delete();
        return redirect()->route('figura.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
