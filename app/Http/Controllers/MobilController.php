<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MobilController extends Controller
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
        $mobil = Inventaris::where('namaBarang','LIKE BINARY', '%mobil%')->get();
        return view('mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
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
            'kode' => 'required|unique:mobil',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mobil = new Mobil();
        $mobil->kode = $request->kode;
        $mobil->namaBarang = $request->namaBarang;
        $mobil->merk = $request->merk;
        $mobil->jumlah = $request->jumlah;
        $mobil->hargaSatuan = $request->hargaSatuan;
        $mobil->lokasi = $request->lokasi;
        $mobil->tahunPembuatan = $request->tahunPembuatan;
        $mobil->tahunBeli = $request->tahunBeli;
        $mobil->hargaKeseluruhan = $mobil->jumlah * $mobil->hargaSatuan;
        $mobil->kondisi = $request->kondisi;
        $mobil->save();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil =Mobil::findOrFail($id);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil =Mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mobil',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mobil =Mobil::findOrFail($id);
        $mobil->kode = $request->kode;
        $mobil->namaBarang = $request->namaBarang;
        $mobil->merk = $request->merk;
        $mobil->jumlah = $request->jumlah;
        $mobil->hargaSatuan = $request->hargaSatuan;
        $mobil->lokasi = $request->lokasi;
        $mobil->tahunPembuatan = $request->tahunPembuatan;
        $mobil->tahunBeli = $request->tahunBeli;
        $mobil->hargaKeseluruhan = $mobil->jumlah * $mobil->hargaSatuan;
        $mobil->kondisi = $request->kondisi;
        $mobil->save();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
