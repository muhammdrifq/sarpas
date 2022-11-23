<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TasController extends Controller
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
        $tas = Inventaris::where('namaBarang','LIKE BINARY', '%Tas%')->get();
        return view('tas.index', compact('tas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tas.create');
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
            'kode' => 'required|unique:tas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tas = new Tas();
        $tas->kode = $request->kode;
        $tas->namaBarang = $request->namaBarang;
        $tas->merk = $request->merk;
        $tas->jumlah = $request->jumlah;
        $tas->hargaSatuan = $request->hargaSatuan;
        $tas->lokasi = $request->lokasi;
        $tas->tahunPembuatan = $request->tahunPembuatan;
        $tas->tahunBeli = $request->tahunBeli;
        $tas->hargaKeseluruhan = $tas->jumlah * $tas->hargaSatuan;
        $tas->kondisi = $request->kondisi;
        $tas->save();
        return redirect()->route('tas.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tas  $tas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tas = Tas::findOrFail($id);
        return view('tas.show', compact('tas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tas  $tas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tas = Tas::findOrFail($id);
        return view('tas.edit', compact('tas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tas  $tas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tas = Tas::findOrFail($id);
        $tas->kode = $request->kode;
        $tas->namaBarang = $request->namaBarang;
        $tas->merk = $request->merk;
        $tas->jumlah = $request->jumlah;
        $tas->hargaSatuan = $request->hargaSatuan;
        $tas->lokasi = $request->lokasi;
        $tas->tahunPembuatan = $request->tahunPembuatan;
        $tas->tahunBeli = $request->tahunBeli;
        $tas->hargaKeseluruhan = $tas->jumlah * $tas->hargaSatuan;
        $tas->kondisi = $request->kondisi;
        $tas->save();
        return redirect()->route('tas.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tas  $tas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tas = Tas::findOrFail($id);
        $tas->delete();
        return redirect()->route('tas.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
