<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class KomputerController extends Controller
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
        $komputer = Inventaris::where('namaBarang','LIKE BINARY','%Komputer%')->get();
        return view('komputer.index', compact('komputer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('komputer.create');
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
            'kode' => 'required|unique:komputer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $komputer = new Komputer();
        $komputer->kode = $request->kode;
        $komputer->namaBarang = $request->namaBarang;
        $komputer->merk = $request->merk;
        $komputer->jumlah = $request->jumlah;
        $komputer->hargaSatuan = $request->hargaSatuan;
        $komputer->lokasi = $request->lokasi;
        $komputer->tahunPembuatan = $request->tahunPembuatan;
        $komputer->tahunBeli = $request->tahunBeli;
        $komputer->hargaKeseluruhan = $komputer->jumlah * $komputer->hargaSatuan;
        $komputer->kondisi = $request->kondisi;
        $komputer->save();
        return redirect()->route('komputer.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komputer = Komputer::findOrFail($id);
        return view('komputer.show', compact('komputer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $komputer = Komputer::findOrFail($id);
        return view('komputer.edit', compact('komputer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:komputer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $komputer = Komputer::findOrFail($id);
        $komputer->kode = $request->kode;
        $komputer->namaBarang = $request->namaBarang;
        $komputer->merk = $request->merk;
        $komputer->jumlah = $request->jumlah;
        $komputer->hargaSatuan = $request->hargaSatuan;
        $komputer->lokasi = $request->lokasi;
        $komputer->tahunPembuatan = $request->tahunPembuatan;
        $komputer->tahunBeli = $request->tahunBeli;
        $komputer->hargaKeseluruhan = $komputer->jumlah * $komputer->hargaSatuan;
        $komputer->kondisi = $request->kondisi;
        $komputer->save();
        return redirect()->route('komputer.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komputer  $komputer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();
        return redirect()->route('komputer.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
