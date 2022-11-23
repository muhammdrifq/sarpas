<?php

namespace App\Http\Controllers;

use App\Models\Blower;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BlowerController extends Controller
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
        $blower = Inventaris::where('namaBarang','LIKE BINARY','%Blower%')->get();
        return view('blower.index', compact('blower'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blower.create');
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
            'kode' => 'required|unique:blower',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $blower = new Blower();
        $blower->kode = $request->kode;
        $blower->namaBarang = $request->namaBarang;
        $blower->merk = $request->merk;
        $blower->jumlah = $request->jumlah;
        $blower->hargaSatuan = $request->hargaSatuan;
        $blower->lokasi = $request->lokasi;
        $blower->tahunPembuatan = $request->tahunPembuatan;
        $blower->tahunBeli = $request->tahunBeli;
        $blower->hargaKeseluruhan = $blower->jumlah * $blower->hargaSatuan;
        $blower->kondisi = $request->kondisi;
        $blower->save();
        return redirect()->route('blower.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blower  $blower
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blower = Blower::findOrFail($id);
        return view('blower.show', compact('blower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blower  $blower
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blower = Blower::findOrFail($id);
        return view('blower.edit', compact('blower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blower  $blower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:blower',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $blower = Blower::findOrFail($id);
        $blower->kode = $request->kode;
        $blower->namaBarang = $request->namaBarang;
        $blower->merk = $request->merk;
        $blower->jumlah = $request->jumlah;
        $blower->hargaSatuan = $request->hargaSatuan;
        $blower->lokasi = $request->lokasi;
        $blower->tahunPembuatan = $request->tahunPembuatan;
        $blower->tahunBeli = $request->tahunBeli;
        $blower->hargaKeseluruhan = $blower->jumlah * $blower->hargaSatuan;
        $blower->kondisi = $request->kondisi;
        $blower->save();
        return redirect()->route('blower.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blower  $blower
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blower = Blower::findOrFail($id);
        $blower->delete();
        return redirect()->route('blower.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
