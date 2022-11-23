<?php

namespace App\Http\Controllers;

use App\Models\CowayHeva;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class cowayhevaController extends Controller
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
        $cowayheva = Inventaris::where('namaBarang','LIKE BINARY','%CowayHeva%')->get();
        return view('cowayheva.index', compact('cowayheva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cowayheva.create');
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
            'kode' => 'required|unique:cowayheva',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cowayheva = new cowayheva();
        $cowayheva->kode = $request->kode;
        $cowayheva->namaBarang = $request->namaBarang;
        $cowayheva->merk = $request->merk;
        $cowayheva->jumlah = $request->jumlah;
        $cowayheva->hargaSatuan = $request->hargaSatuan;
        $cowayheva->lokasi = $request->lokasi;
        $cowayheva->tahunPembuatan = $request->tahunPembuatan;
        $cowayheva->tahunBeli = $request->tahunBeli;
        $cowayheva->hargaKeseluruhan = $cowayheva->jumlah * $cowayheva->hargaSatuan;
        $cowayheva->kondisi = $request->kondisi;
        $cowayheva->save();
        return redirect()->route('cowayheva.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CowayHeva  $cowayHeva
     * @return \Illuminate\Http\Response
     */
    public function show(CowayHeva $cowayHeva)
    {
        $cowayheva = cowayheva::findOrFail($id);
        return view('cowayheva.show', compact('cowayheva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CowayHeva  $cowayHeva
     * @return \Illuminate\Http\Response
     */
    public function edit(CowayHeva $cowayHeva)
    {
        $cowayheva = cowayheva::findOrFail($id);
        return view('cowayheva.edit', compact('cowayheva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CowayHeva  $cowayHeva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:cowayheva',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cowayheva = CowayHeva::findOrFail($id);
        $cowayheva->kode = $request->kode;
        $cowayheva->namaBarang = $request->namaBarang;
        $cowayheva->merk = $request->merk;
        $cowayheva->jumlah = $request->jumlah;
        $cowayheva->hargaSatuan = $request->hargaSatuan;
        $cowayheva->lokasi = $request->lokasi;
        $cowayheva->tahunPembuatan = $request->tahunPembuatan;
        $cowayheva->tahunBeli = $request->tahunBeli;
        $cowayheva->hargaKeseluruhan = $cowayheva->jumlah * $cowayheva->hargaSatuan;
        $cowayheva->kondisi = $request->kondisi;
        $cowayheva->save();
        return redirect()->route('cowayheva.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CowayHeva  $cowayHeva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cowayheva = CowayHeva::findOrFail($id);
        $cowayheva->delete();
        return redirect()->route('cowayheva.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
