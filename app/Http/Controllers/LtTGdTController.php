<?php

namespace App\Http\Controllers;

use App\Models\LtTGdT;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtTGdTRequest;
use App\Http\Requests\UpdateLtTGdTRequest;

class LtTGdTController extends Controller
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
        $lttgdt = Inventaris::where('lokasi','LIKE BINARY','%Lt.3 Gd.3%')->get();
        return view('lttgdt.index', compact('lttgdt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lttgdt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtTGdTRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtTGdTRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgdt = new LtTGdT();
        $lttgdt->kode = $request->kode;
        $lttgdt->namaBarang = $request->namaBarang;
        $lttgdt->merk = $request->merk;
        $lttgdt->jumlah = $request->jumlah;
        $lttgdt->hargaSatuan = $request->hargaSatuan;
        $lttgdt->lokasi = $request->lokasi;
        $lttgdt->tahunPembuatan = $request->tahunPembuatan;
        $lttgdt->tahunBeli = $request->tahunBeli;
        $lttgdt->hargaKeseluruhan = $lttgdt->jumlah * $lttgdt->hargaSatuan;
        $lttgdt->kondisi = $request->kondisi;
        $lttgdt->save();
        return redirect()->route('lttgdt.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtTGdT  $ltTGdT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lttgdt =LtTGdT::findOrFail($id);
        return view('lttgdt.show', compact('lttgdt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtTGdT  $ltTGdT
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lttgdt =LtTGdT::findOrFail($id);
        return view('lttgdt.edit', compact('lttgdt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtTGdTRequest  $request
     * @param  \App\Models\LtTGdT  $ltTGdT
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtTGdTRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgdt',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgdt =LtTGdT::findOrFail($id);
        $lttgdt->kode = $request->kode;
        $lttgdt->namaBarang = $request->namaBarang;
        $lttgdt->merk = $request->merk;
        $lttgdt->jumlah = $request->jumlah;
        $lttgdt->hargaSatuan = $request->hargaSatuan;
        $lttgdt->lokasi = $request->lokasi;
        $lttgdt->tahunPembuatan = $request->tahunPembuatan;
        $lttgdt->tahunBeli = $request->tahunBeli;
        $lttgdt->hargaKeseluruhan = $lttgdt->jumlah * $lttgdt->hargaSatuan;
        $lttgdt->kondisi = $request->kondisi;
        $lttgdt->save();
        return redirect()->route('lttgdt.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtTGdT  $ltTGdT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lttgdt = LtTGdT::findOrFail($id);
        $lttgdt->delete();
        return redirect()->route('lttgdt.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
