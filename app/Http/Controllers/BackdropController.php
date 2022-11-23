<?php

namespace App\Http\Controllers;

use App\Models\Backdrop;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BackdropController extends Controller
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
        $backdrop = Inventaris::where('namaBarang','LIKE BINARY','%Backdrop%')->get();
        return view('backdrop.index', compact('backdrop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backdrop.create');
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
            'kode' => 'required|unique:backdrop',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $backdrop = new Backdrop();
        $backdrop->kode = $request->kode;
        $backdrop->namaBarang = $request->namaBarang;
        $backdrop->merk = $request->merk;
        $backdrop->jumlah = $request->jumlah;
        $backdrop->hargaSatuan = $request->hargaSatuan;
        $backdrop->lokasi = $request->lokasi;
        $backdrop->tahunPembuatan = $request->tahunPembuatan;
        $backdrop->tahunBeli = $request->tahunBeli;
        $backdrop->hargaKeseluruhan = $backdrop->jumlah * $backdrop->hargaSatuan;
        $backdrop->kondisi = $request->kondisi;
        $backdrop->save();
        return redirect()->route('backdrop.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backdrop  $backdrop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $backdrop = Backdrop::findOrFail($id);
        return view('backdrop.show', compact('backdrop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backdrop  $backdrop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $backdrop = Backdrop::findOrFail($id);
        return view('backdrop.edit', compact('backdrop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backdrop  $backdrop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:backdrop',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $backdrop = Backdrop::findOrFail($id);
        $backdrop->kode = $request->kode;
        $backdrop->namaBarang = $request->namaBarang;
        $backdrop->merk = $request->merk;
        $backdrop->jumlah = $request->jumlah;
        $backdrop->hargaSatuan = $request->hargaSatuan;
        $backdrop->lokasi = $request->lokasi;
        $backdrop->tahunPembuatan = $request->tahunPembuatan;
        $backdrop->tahunBeli = $request->tahunBeli;
        $backdrop->hargaKeseluruhan = $backdrop->jumlah * $backdrop->hargaSatuan;
        $backdrop->kondisi = $request->kondisi;
        $backdrop->save();
        return redirect()->route('backdrop.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backdrop  $backdrop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $backdrop = Backdrop::findOrFail($id);
        $backdrop->delete();
        return redirect()->route('backdrop.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
