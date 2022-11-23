<?php

namespace App\Http\Controllers;

use App\Models\Tablet;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TabletController extends Controller
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
        $tablet = Inventaris::where('namaBarang','LIKE BINARY', '%Tablet%')->get();
        return view('tablet.index', compact('tablet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablet.create');
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
            'kode' => 'required|unique:tablet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tablet = new Tablet();
        $tablet->kode = $request->kode;
        $tablet->namaBarang = $request->namaBarang;
        $tablet->merk = $request->merk;
        $tablet->jumlah = $request->jumlah;
        $tablet->hargaSatuan = $request->hargaSatuan;
        $tablet->lokasi = $request->lokasi;
        $tablet->tahunPembuatan = $request->tahunPembuatan;
        $tablet->tahunBeli = $request->tahunBeli;
        $tablet->hargaKeseluruhan = $tablet->jumlah * $tablet->hargaSatuan;
        $tablet->kondisi = $request->kondisi;
        $tablet->save();
        return redirect()->route('tablet.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablet = Tablet::findOrFail($id);
        return view('tablet.show', compact('tablet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablet = Tablet::findOrFail($id);
        return view('tablet.edit', compact('tablet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tablet',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tablet = Tablet::findOrFail($id);
        $tablet->kode = $request->kode;
        $tablet->namaBarang = $request->namaBarang;
        $tablet->merk = $request->merk;
        $tablet->jumlah = $request->jumlah;
        $tablet->hargaSatuan = $request->hargaSatuan;
        $tablet->lokasi = $request->lokasi;
        $tablet->tahunPembuatan = $request->tahunPembuatan;
        $tablet->tahunBeli = $request->tahunBeli;
        $tablet->hargaKeseluruhan = $tablet->jumlah * $tablet->hargaSatuan;
        $tablet->kondisi = $request->kondisi;
        $tablet->save();
        return redirect()->route('tablet.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tablet  $tablet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tablet = Tablet::findOrFail($id);
        $tablet->delete();
        return redirect()->route('tablet.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
