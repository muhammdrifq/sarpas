<?php

namespace App\Http\Controllers;

use App\Models\Mixer;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MixerController extends Controller
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
        $mixer = Inventaris::where('namaBarang','LIKE BINARY', '%mixer%')->get();
        return view('mixer.index', compact('mixer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mixer.create');
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
            'kode' => 'required|unique:mixer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mixer = new Mixer();
        $mixer->kode = $request->kode;
        $mixer->namaBarang = $request->namaBarang;
        $mixer->merk = $request->merk;
        $mixer->jumlah = $request->jumlah;
        $mixer->hargaSatuan = $request->hargaSatuan;
        $mixer->lokasi = $request->lokasi;
        $mixer->tahunPembuatan = $request->tahunPembuatan;
        $mixer->tahunBeli = $request->tahunBeli;
        $mixer->hargaKeseluruhan = $mixer->jumlah * $mixer->hargaSatuan;
        $mixer->kondisi = $request->kondisi;
        $mixer->save();
        return redirect()->route('mixer.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mixer  $mixer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mixer =Mixer::findOrFail($id);
        return view('mixer.show', compact('mixer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mixer  $mixer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mixer =Mixer::findOrFail($id);
        return view('mixer.edit', compact('mixer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mixer  $mixer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mixer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mixer =Mixer::findOrFail($id);
        $mixer->kode = $request->kode;
        $mixer->namaBarang = $request->namaBarang;
        $mixer->merk = $request->merk;
        $mixer->jumlah = $request->jumlah;
        $mixer->hargaSatuan = $request->hargaSatuan;
        $mixer->lokasi = $request->lokasi;
        $mixer->tahunPembuatan = $request->tahunPembuatan;
        $mixer->tahunBeli = $request->tahunBeli;
        $mixer->hargaKeseluruhan = $mixer->jumlah * $mixer->hargaSatuan;
        $mixer->kondisi = $request->kondisi;
        $mixer->save();
        return redirect()->route('mixer.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mixer  $mixer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mixer = Mixer::findOrFail($id);
        $mixer->delete();
        return redirect()->route('mixer.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
