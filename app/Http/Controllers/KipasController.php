<?php

namespace App\Http\Controllers;

use App\Models\Kipas;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class KipasController extends Controller
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
        $kipas = Inventaris::where('namaBarang','LIKE BINARY','%Kipas%')->get();
        return view('kipas.index', compact('kipas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kipas.create');
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
            'kode' => 'required|unique:kipas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kipas = new Kipas();
        $kipas->kode = $request->kode;
        $kipas->namaBarang = $request->namaBarang;
        $kipas->merk = $request->merk;
        $kipas->jumlah = $request->jumlah;
        $kipas->hargaSatuan = $request->hargaSatuan;
        $kipas->lokasi = $request->lokasi;
        $kipas->tahunPembuatan = $request->tahunPembuatan;
        $kipas->tahunBeli = $request->tahunBeli;
        $kipas->hargaKeseluruhan = $kipas->jumlah * $kipas->hargaSatuan;
        $kipas->kondisi = $request->kondisi;
        $kipas->save();
        return redirect()->route('kipas.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kipas  $kipas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kipas = Kipas::findOrFail($id);
        return view('kipas.show', compact('kipas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kipas  $kipas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kipas = Kipas::findOrFail($id);
        return view('kipas.edit', compact('kipas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kipas  $kipas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:kipas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kipas = Kipas::findOrFail($id);
        $kipas->kode = $request->kode;
        $kipas->namaBarang = $request->namaBarang;
        $kipas->merk = $request->merk;
        $kipas->jumlah = $request->jumlah;
        $kipas->hargaSatuan = $request->hargaSatuan;
        $kipas->lokasi = $request->lokasi;
        $kipas->tahunPembuatan = $request->tahunPembuatan;
        $kipas->tahunBeli = $request->tahunBeli;
        $kipas->hargaKeseluruhan = $kipas->jumlah * $kipas->hargaSatuan;
        $kipas->kondisi = $request->kondisi;
        $kipas->save();
        return redirect()->route('kipas.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kipas  $kipas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kipas = Kipas::findOrFail($id);
        $kipas->delete();
        return redirect()->route('kipas.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
