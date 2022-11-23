<?php

namespace App\Http\Controllers;

use App\Models\PenghancurKertas;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PenghancurKertasController extends Controller
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
        $penghancurkertas = Inventaris::where('namaBarang','LIKE BINARY', '%Penghancur Kertas%')->get();
        return view('penghancurkertas.index', compact('penghancurkertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penghancurkertas.create');
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
            'kode' => 'required|unique:penghancurkertas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $penghancurkertas = new PenghancurKertas();
        $penghancurkertas->kode = $request->kode;
        $penghancurkertas->namaBarang = $request->namaBarang;
        $penghancurkertas->merk = $request->merk;
        $penghancurkertas->jumlah = $request->jumlah;
        $penghancurkertas->hargaSatuan = $request->hargaSatuan;
        $penghancurkertas->lokasi = $request->lokasi;
        $penghancurkertas->tahunPembuatan = $request->tahunPembuatan;
        $penghancurkertas->tahunBeli = $request->tahunBeli;
        $penghancurkertas->hargaKeseluruhan = $penghancurkertas->jumlah * $penghancurkertas->hargaSatuan;
        $penghancurkertas->kondisi = $request->kondisi;
        $penghancurkertas->save();
        return redirect()->route('penghancurkertas.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenghancurKertas  $penghancurKertas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penghancurkertas = PenghancurKertas::findOrFail($id);
        return view('penghancurkertas.show', compact('penghancurkertas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenghancurKertas  $penghancurKertas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penghancurkertas = PenghancurKertas::findOrFail($id);
        return view('penghancurkertas.edit', compact('penghancurkertas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenghancurKertas  $penghancurKertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:penghancurkertas',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $penghancurkertas = PenghancurKertas::findOrFail($id);
        $penghancurkertas->kode = $request->kode;
        $penghancurkertas->namaBarang = $request->namaBarang;
        $penghancurkertas->merk = $request->merk;
        $penghancurkertas->jumlah = $request->jumlah;
        $penghancurkertas->hargaSatuan = $request->hargaSatuan;
        $penghancurkertas->lokasi = $request->lokasi;
        $penghancurkertas->tahunPembuatan = $request->tahunPembuatan;
        $penghancurkertas->tahunBeli = $request->tahunBeli;
        $penghancurkertas->hargaKeseluruhan = $penghancurkertas->jumlah * $penghancurkertas->hargaSatuan;
        $penghancurkertas->kondisi = $request->kondisi;
        $penghancurkertas->save();
        return redirect()->route('penghancurkertas.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenghancurKertas  $penghancurKertas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penghancurkertas = PenghancurKertas::findOrFail($id);
        $penghancurkertas->delete();
        return redirect()->route('penghancurkertas.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
