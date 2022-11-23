<?php

namespace App\Http\Controllers;

use App\Models\Toa;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ToaController extends Controller
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
        $toa = Inventaris::where('namaBarang','LIKE BINARY', '%toa%')->get();
        return view('toa.index', compact('toa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toa.create');
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
            'kode' => 'required|unique:toa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $toa = new Toa();
        $toa->kode = $request->kode;
        $toa->namaBarang = $request->namaBarang;
        $toa->merk = $request->merk;
        $toa->jumlah = $request->jumlah;
        $toa->hargaSatuan = $request->hargaSatuan;
        $toa->lokasi = $request->lokasi;
        $toa->tahunPembuatan = $request->tahunPembuatan;
        $toa->tahunBeli = $request->tahunBeli;
        $toa->hargaKeseluruhan = $toa->jumlah * $toa->hargaSatuan;
        $toa->kondisi = $request->kondisi;
        $toa->save();
        return redirect()->route('toa.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toa  $toa
     * @return \Illuminate\Http\Response
     */
    public function show(Toa $toa)
    {
        $toa = toa::findOrFail($id);
        return view('toa.show', compact('toa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toa  $toa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toa = Toa::findOrFail($id);
        return view('toa.edit', compact('toa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toa  $toa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:toa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $toa = Toa::findOrFail($id);
        $toa->kode = $request->kode;
        $toa->namaBarang = $request->namaBarang;
        $toa->merk = $request->merk;
        $toa->jumlah = $request->jumlah;
        $toa->hargaSatuan = $request->hargaSatuan;
        $toa->lokasi = $request->lokasi;
        $toa->tahunPembuatan = $request->tahunPembuatan;
        $toa->tahunBeli = $request->tahunBeli;
        $toa->hargaKeseluruhan = $toa->jumlah * $toa->hargaSatuan;
        $toa->kondisi = $request->kondisi;
        $toa->save();
        return redirect()->route('toa.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toa  $toa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toa $toa)
    {
        $toa = Toa::findOrFail($id);
        $toa->delete();
        return redirect()->route('toa.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
