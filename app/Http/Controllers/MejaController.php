<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MejaController extends Controller
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
        $meja = Inventaris::where('namaBarang','LIKE BINARY','%meja%')->get();
        return view('meja.index', compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meja.create');
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
            'kode' => 'required|unique:meja',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $meja = new Meja();
        $meja->kode = $request->kode;
        $meja->namaBarang = $request->namaBarang;
        $meja->merk = $request->merk;
        $meja->jumlah = $request->jumlah;
        $meja->hargaSatuan = $request->hargaSatuan;
        $meja->lokasi = $request->lokasi;
        $meja->tahunPembuatan = $request->tahunPembuatan;
        $meja->tahunBeli = $request->tahunBeli;
        $meja->hargaKeseluruhan = $meja->jumlah * $meja->hargaSatuan;
        $meja->kondisi = $request->kondisi;
        $meja->save();
        return redirect()->route('meja.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meja =Meja::findOrFail($id);
        return view('meja.show', compact('meja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meja =Meja::findOrFail($id);
        return view('meja.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:meja',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $meja =Meja::findOrFail($id);
        $meja->kode = $request->kode;
        $meja->namaBarang = $request->namaBarang;
        $meja->merk = $request->merk;
        $meja->jumlah = $request->jumlah;
        $meja->hargaSatuan = $request->hargaSatuan;
        $meja->lokasi = $request->lokasi;
        $meja->tahunPembuatan = $request->tahunPembuatan;
        $meja->tahunBeli = $request->tahunBeli;
        $meja->hargaKeseluruhan = $meja->jumlah * $meja->hargaSatuan;
        $meja->kondisi = $request->kondisi;
        $meja->save();
        return redirect()->route('meja.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();
        return redirect()->route('meja.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
