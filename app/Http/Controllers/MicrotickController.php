<?php

namespace App\Http\Controllers;

use App\Models\Microtick;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MicrotickController extends Controller
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
        $microtick = Inventaris::where('namaBarang','LIKE BINARY', '%Microtik%')->get();
        return view('microtick.index', compact('microtick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('microtick.create');
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
            'kode' => 'required|unique:microtick',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $microtick = new Microtick();
        $microtick->kode = $request->kode;
        $microtick->namaBarang = $request->namaBarang;
        $microtick->merk = $request->merk;
        $microtick->jumlah = $request->jumlah;
        $microtick->hargaSatuan = $request->hargaSatuan;
        $microtick->lokasi = $request->lokasi;
        $microtick->tahunPembuatan = $request->tahunPembuatan;
        $microtick->tahunBeli = $request->tahunBeli;
        $microtick->hargaKeseluruhan = $microtick->jumlah * $microtick->hargaSatuan;
        $microtick->kondisi = $request->kondisi;
        $microtick->save();
        return redirect()->route('microtick.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Microtick  $microtick
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $microtick = Microtick::findOrFail($id);
        return view('microtick.show', compact('microtick'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Microtick  $microtick
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $microtick = Microtick::findOrFail($id);
        return view('microtick.edit', compact('microtick'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Microtick  $microtick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:microtick',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $microtick = Microtick::findOrFail($id);
        $microtick->kode = $request->kode;
        $microtick->namaBarang = $request->namaBarang;
        $microtick->merk = $request->merk;
        $microtick->jumlah = $request->jumlah;
        $microtick->hargaSatuan = $request->hargaSatuan;
        $microtick->lokasi = $request->lokasi;
        $microtick->tahunPembuatan = $request->tahunPembuatan;
        $microtick->tahunBeli = $request->tahunBeli;
        $microtick->hargaKeseluruhan = $microtick->jumlah * $microtick->hargaSatuan;
        $microtick->kondisi = $request->kondisi;
        $microtick->save();
        return redirect()->route('microtick.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Microtick  $microtick
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $microtick = Microtick::findOrFail($id);
        $microtick->delete();
        return redirect()->route('microtick.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
