<?php

namespace App\Http\Controllers;

use App\Models\Lampu;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class LampuController extends Controller
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
        $lampu = Inventaris::where('namaBarang','LIKE BINARY','%Lampu%')->get();
        return view('lampu.index', compact('lampu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lampu.create');
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
            'kode' => 'required|unique:lampu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lampu = new Lampu();
        $lampu->kode = $request->kode;
        $lampu->namaBarang = $request->namaBarang;
        $lampu->merk = $request->merk;
        $lampu->jumlah = $request->jumlah;
        $lampu->hargaSatuan = $request->hargaSatuan;
        $lampu->lokasi = $request->lokasi;
        $lampu->tahunPembuatan = $request->tahunPembuatan;
        $lampu->tahunBeli = $request->tahunBeli;
        $lampu->hargaKeseluruhan = $lampu->jumlah * $lampu->hargaSatuan;
        $lampu->kondisi = $request->kondisi;
        $lampu->save();
        return redirect()->route('lampu.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lampu  $lampu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lampu = Lampu::findOrFail($id);
        return view('lampu.show', compact('lampu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lampu  $lampu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lampu = Lampu::findOrFail($id);
        return view('lampu.edit', compact('lampu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lampu  $lampu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lampu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lampu = Lampu::findOrFail($id);
        $lampu->kode = $request->kode;
        $lampu->namaBarang = $request->namaBarang;
        $lampu->merk = $request->merk;
        $lampu->jumlah = $request->jumlah;
        $lampu->hargaSatuan = $request->hargaSatuan;
        $lampu->lokasi = $request->lokasi;
        $lampu->tahunPembuatan = $request->tahunPembuatan;
        $lampu->tahunBeli = $request->tahunBeli;
        $lampu->hargaKeseluruhan = $lampu->jumlah * $lampu->hargaSatuan;
        $lampu->kondisi = $request->kondisi;
        $lampu->save();
        return redirect()->route('lampu.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lampu  $lampu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lampu = Lampu::findOrFail($id);
        $lampu->delete();
        return redirect()->route('lampu.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
