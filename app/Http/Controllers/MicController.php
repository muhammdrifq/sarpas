<?php

namespace App\Http\Controllers;

use App\Models\Mic;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MicController extends Controller
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
        $mic = Inventaris::where('namaBarang','LIKE BINARY', '%mic%')->get();
        return view('mic.index', compact('mic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mic.create');
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
            'kode' => 'required|unique:mic',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mic = new Mic();
        $mic->kode = $request->kode;
        $mic->namaBarang = $request->namaBarang;
        $mic->merk = $request->merk;
        $mic->jumlah = $request->jumlah;
        $mic->hargaSatuan = $request->hargaSatuan;
        $mic->lokasi = $request->lokasi;
        $mic->tahunPembuatan = $request->tahunPembuatan;
        $mic->tahunBeli = $request->tahunBeli;
        $mic->hargaKeseluruhan = $mic->jumlah * $mic->hargaSatuan;
        $mic->kondisi = $request->kondisi;
        $mic->save();
        return redirect()->route('mic.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mic  $mic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mic =Mic::findOrFail($id);
        return view('mic.show', compact('mic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mic  $mic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mic =Mic::findOrFail($id);
        return view('mic.edit', compact('mic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mic  $mic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mic',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $mic =Mic::findOrFail($id);
        $mic->kode = $request->kode;
        $mic->namaBarang = $request->namaBarang;
        $mic->merk = $request->merk;
        $mic->jumlah = $request->jumlah;
        $mic->hargaSatuan = $request->hargaSatuan;
        $mic->lokasi = $request->lokasi;
        $mic->tahunPembuatan = $request->tahunPembuatan;
        $mic->tahunBeli = $request->tahunBeli;
        $mic->hargaKeseluruhan = $mic->jumlah * $mic->hargaSatuan;
        $mic->kondisi = $request->kondisi;
        $mic->save();
        return redirect()->route('mic.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mic  $mic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mic = Mic::findOrFail($id);
        $mic->delete();
        return redirect()->route('mic.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
