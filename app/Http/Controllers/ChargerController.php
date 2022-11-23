<?php

namespace App\Http\Controllers;

use App\Models\Charger;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ChargerController extends Controller
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
        $charger = Inventaris::where('namaBarang','LIKE BINARY','%Charger%')->get();
        return view('charger.index', compact('charger'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('charger.create');
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
            'kode' => 'required|unique:charger',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $charger = new Charger();
        $charger->kode = $request->kode;
        $charger->namaBarang = $request->namaBarang;
        $charger->merk = $request->merk;
        $charger->jumlah = $request->jumlah;
        $charger->hargaSatuan = $request->hargaSatuan;
        $charger->lokasi = $request->lokasi;
        $charger->tahunPembuatan = $request->tahunPembuatan;
        $charger->tahunBeli = $request->tahunBeli;
        $charger->hargaKeseluruhan = $charger->jumlah * $charger->hargaSatuan;
        $charger->kondisi = $request->kondisi;
        $charger->save();
        return redirect()->route('charger.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charger  $charger
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $charger = Charger::findOrFail($id);
        return view('charger.show', compact('charger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charger  $charger
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charger = Charger::findOrFail($id);
        return view('charger.edit', compact('charger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charger  $charger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:charger',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $charger = Charger::findOrFail($id);
        $charger->kode = $request->kode;
        $charger->namaBarang = $request->namaBarang;
        $charger->merk = $request->merk;
        $charger->jumlah = $request->jumlah;
        $charger->hargaSatuan = $request->hargaSatuan;
        $charger->lokasi = $request->lokasi;
        $charger->tahunPembuatan = $request->tahunPembuatan;
        $charger->tahunBeli = $request->tahunBeli;
        $charger->hargaKeseluruhan = $charger->jumlah * $charger->hargaSatuan;
        $charger->kondisi = $request->kondisi;
        $charger->save();
        return redirect()->route('charger.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charger  $charger
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charger = Charger::findOrFail($id);
        $charger->delete();
        return redirect()->route('charger.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
