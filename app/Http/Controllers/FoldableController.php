<?php

namespace App\Http\Controllers;

use App\Models\Foldable;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class FoldableController extends Controller
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
        $foldable = Inventaris::where('namaBarang','LIKE BINARY','%Foldable%')->get();
        return view('foldable.index', compact('foldable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foldable.create');
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
            'kode' => 'required|unique:foldable',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $foldable = new Foldable();
        $foldable->kode = $request->kode;
        $foldable->namaBarang = $request->namaBarang;
        $foldable->merk = $request->merk;
        $foldable->jumlah = $request->jumlah;
        $foldable->hargaSatuan = $request->hargaSatuan;
        $foldable->lokasi = $request->lokasi;
        $foldable->tahunPembuatan = $request->tahunPembuatan;
        $foldable->tahunBeli = $request->tahunBeli;
        $foldable->hargaKeseluruhan = $foldable->jumlah * $foldable->hargaSatuan;
        $foldable->kondisi = $request->kondisi;
        $foldable->save();
        return redirect()->route('foldable.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foldable  $foldable
     * @return \Illuminate\Http\Response
     */
    public function show(Foldable $foldable)
    {
        $foldable = Foldable::findOrFail($id);
        return view('foldable.show', compact('foldable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foldable  $foldable
     * @return \Illuminate\Http\Response
     */
    public function edit(Foldable $foldable)
    {
        $foldable = Foldable::findOrFail($id);
        return view('foldable.edit', compact('foldable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foldable  $foldable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:foldable',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $foldable = Foldable::findOrFail($id);
        $foldable->kode = $request->kode;
        $foldable->namaBarang = $request->namaBarang;
        $foldable->merk = $request->merk;
        $foldable->jumlah = $request->jumlah;
        $foldable->hargaSatuan = $request->hargaSatuan;
        $foldable->lokasi = $request->lokasi;
        $foldable->tahunPembuatan = $request->tahunPembuatan;
        $foldable->tahunBeli = $request->tahunBeli;
        $foldable->hargaKeseluruhan = $foldable->jumlah * $foldable->hargaSatuan;
        $foldable->kondisi = $request->kondisi;
        $foldable->save();
        return redirect()->route('foldable.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foldable  $foldable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foldable = Foldable::findOrFail($id);
        $foldable->delete();
        return redirect()->route('foldable.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
