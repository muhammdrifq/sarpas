<?php

namespace App\Http\Controllers;

use App\Models\Selector;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class SelectorController extends Controller
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
        $selector = Inventaris::where('namaBarang','LIKE BINARY', '%selector%')->get();
        return view('selector.index', compact('selector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('selector.create');
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
            'kode' => 'required|unique:selector',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $selector = new Selector();
        $selector->kode = $request->kode;
        $selector->namaBarang = $request->namaBarang;
        $selector->merk = $request->merk;
        $selector->jumlah = $request->jumlah;
        $selector->hargaSatuan = $request->hargaSatuan;
        $selector->lokasi = $request->lokasi;
        $selector->tahunPembuatan = $request->tahunPembuatan;
        $selector->tahunBeli = $request->tahunBeli;
        $selector->hargaKeseluruhan = $selector->jumlah * $selector->hargaSatuan;
        $selector->kondisi = $request->kondisi;
        $selector->save();
        return redirect()->route('selector.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selector  $selector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selector = Selector::findOrFail($id);
        return view('selector.show', compact('selector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selector  $selector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selector = Selector::findOrFail($id);
        return view('selector.edit', compact('selector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Selector  $selector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:selector',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $selector = Selector::findOrFail($id);
        $selector->kode = $request->kode;
        $selector->namaBarang = $request->namaBarang;
        $selector->merk = $request->merk;
        $selector->jumlah = $request->jumlah;
        $selector->hargaSatuan = $request->hargaSatuan;
        $selector->lokasi = $request->lokasi;
        $selector->tahunPembuatan = $request->tahunPembuatan;
        $selector->tahunBeli = $request->tahunBeli;
        $selector->hargaKeseluruhan = $selector->jumlah * $selector->hargaSatuan;
        $selector->kondisi = $request->kondisi;
        $selector->save();
        return redirect()->route('selector.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selector  $selector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selector = Selector::findOrFail($id);
        $selector->delete();
        return redirect()->route('selector.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
