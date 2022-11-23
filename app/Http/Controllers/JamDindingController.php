<?php

namespace App\Http\Controllers;

use App\Models\JamDinding;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class JamDindingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\jamdindingtp\Response
     */
    public function index()
    {
        $jamdinding = Inventaris::where('namaBarang','LIKE BINARY','%jamdinding%')->get();
        return view('jamdinding.index', compact('jamdinding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\jamdindingtp\Response
     */
    public function create()
    {
        return view('jamdinding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\jamdindingtp\Request  $request
     * @return \Illuminate\jamdindingtp\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jamdinding',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jamdinding = new JamDinding();
        $jamdinding->kode = $request->kode;
        $jamdinding->namaBarang = $request->namaBarang;
        $jamdinding->merk = $request->merk;
        $jamdinding->jumlah = $request->jumlah;
        $jamdinding->hargaSatuan = $request->hargaSatuan;
        $jamdinding->lokasi = $request->lokasi;
        $jamdinding->tahunPembuatan = $request->tahunPembuatan;
        $jamdinding->tahunBeli = $request->tahunBeli;
        $jamdinding->hargaKeseluruhan = $jamdinding->jumlah * $jamdinding->hargaSatuan;
        $jamdinding->kondisi = $request->kondisi;
        $jamdinding->save();
        return redirect()->route('jamdinding.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JamDinding  $jamDinding
     * @return \Illuminate\jamdindingtp\Response
     */
    public function show($id)
    {
        $jamdinding = JamDinding::findOrFail($id);
        return view('jamdinding.show', compact('jamdinding'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JamDinding  $jamDinding
     * @return \Illuminate\jamdindingtp\Response
     */
    public function edit($id)
    {
        $jamdinding = JamDinding::findOrFail($id);
        return view('jamdinding.edit', compact('jamdinding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\jamdindingtp\Request  $request
     * @param  \App\Models\JamDinding  $jamDinding
     * @return \Illuminate\jamdindingtp\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jamdinding',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jamdinding = JamDinding::findOrFail($id);
        $jamdinding->kode = $request->kode;
        $jamdinding->namaBarang = $request->namaBarang;
        $jamdinding->merk = $request->merk;
        $jamdinding->jumlah = $request->jumlah;
        $jamdinding->hargaSatuan = $request->hargaSatuan;
        $jamdinding->lokasi = $request->lokasi;
        $jamdinding->tahunPembuatan = $request->tahunPembuatan;
        $jamdinding->tahunBeli = $request->tahunBeli;
        $jamdinding->hargaKeseluruhan = $jamdinding->jumlah * $jamdinding->hargaSatuan;
        $jamdinding->kondisi = $request->kondisi;
        $jamdinding->save();
        return redirect()->route('jamdinding.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JamDinding  $jamDinding
     * @return \Illuminate\jamdindingtp\Response
     */
    public function destroy($id)
    {
        $jamdinding = JamDinding::findOrFail($id);
        $jamdinding->delete();
        return redirect()->route('jamdinding.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
