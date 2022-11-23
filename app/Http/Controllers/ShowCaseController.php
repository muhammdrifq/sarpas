<?php

namespace App\Http\Controllers;

use App\Models\ShowCase;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ShowCaseController extends Controller
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
        $showcase = Inventaris::where('namaBarang','LIKE BINARY', '%showcase%')->get();
        return view('showcase.index', compact('showcase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('showcase.create');
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
            'kode' => 'required|unique:showcase',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $showcase = new ShowCase();
        $showcase->kode = $request->kode;
        $showcase->namaBarang = $request->namaBarang;
        $showcase->merk = $request->merk;
        $showcase->jumlah = $request->jumlah;
        $showcase->hargaSatuan = $request->hargaSatuan;
        $showcase->lokasi = $request->lokasi;
        $showcase->tahunPembuatan = $request->tahunPembuatan;
        $showcase->tahunBeli = $request->tahunBeli;
        $showcase->hargaKeseluruhan = $showcase->jumlah * $showcase->hargaSatuan;
        $showcase->kondisi = $request->kondisi;
        $showcase->save();
        return redirect()->route('showcase.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showcase = ShowCase::findOrFail($id);
        return view('showcase.show', compact('showcase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showcase = ShowCase::findOrFail($id);
        return view('showcase.edit', compact('showcase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:showcase',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $showcase = ShowCase::findOrFail($id);
        $showcase->kode = $request->kode;
        $showcase->namaBarang = $request->namaBarang;
        $showcase->merk = $request->merk;
        $showcase->jumlah = $request->jumlah;
        $showcase->hargaSatuan = $request->hargaSatuan;
        $showcase->lokasi = $request->lokasi;
        $showcase->tahunPembuatan = $request->tahunPembuatan;
        $showcase->tahunBeli = $request->tahunBeli;
        $showcase->hargaKeseluruhan = $showcase->jumlah * $showcase->hargaSatuan;
        $showcase->kondisi = $request->kondisi;
        $showcase->save();
        return redirect()->route('showcase.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShowCase  $showCase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $showcase = ShowCase::findOrFail($id);
        $showcase->delete();
        return redirect()->route('showcase.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
