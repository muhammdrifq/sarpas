<?php

namespace App\Http\Controllers;

use App\Models\Tripod;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TripodController extends Controller
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
        $tripod = Inventaris::where('namaBarang','LIKE BINARY', '%Tripod%')->get();
        return view('tripod.index', compact('tripod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tripod.create');
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
            'kode' => 'required|unique:tripod',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tripod = new Tripod();
        $tripod->kode = $request->kode;
        $tripod->namaBarang = $request->namaBarang;
        $tripod->merk = $request->merk;
        $tripod->jumlah = $request->jumlah;
        $tripod->hargaSatuan = $request->hargaSatuan;
        $tripod->lokasi = $request->lokasi;
        $tripod->tahunPembuatan = $request->tahunPembuatan;
        $tripod->tahunBeli = $request->tahunBeli;
        $tripod->hargaKeseluruhan = $tripod->jumlah * $tripod->hargaSatuan;
        $tripod->kondisi = $request->kondisi;
        $tripod->save();
        return redirect()->route('tripod.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tripod  $tripod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tripod = Tripod::findOrFail($id);
        return view('tripod.show', compact('tripod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tripod  $tripod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tripod = Tripod::findOrFail($id);
        return view('tripod.edit', compact('tripod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tripod  $tripod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:tripod',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $tripod = Tripod::findOrFail($id);
        $tripod->kode = $request->kode;
        $tripod->namaBarang = $request->namaBarang;
        $tripod->merk = $request->merk;
        $tripod->jumlah = $request->jumlah;
        $tripod->hargaSatuan = $request->hargaSatuan;
        $tripod->lokasi = $request->lokasi;
        $tripod->tahunPembuatan = $request->tahunPembuatan;
        $tripod->tahunBeli = $request->tahunBeli;
        $tripod->hargaKeseluruhan = $tripod->jumlah * $tripod->hargaSatuan;
        $tripod->kondisi = $request->kondisi;
        $tripod->save();
        return redirect()->route('tripod.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tripod  $tripod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tripod = Tripod::findOrFail($id);
        $tripod->delete();
        return redirect()->route('tripod.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
