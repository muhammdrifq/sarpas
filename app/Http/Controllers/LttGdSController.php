<?php

namespace App\Http\Controllers;

use App\Models\LttGdS;
use App\Models\Inventaris;
use App\Http\Requests\StoreLttGdSRequest;
use App\Http\Requests\UpdateLttGdSRequest;

class LttGdSController extends Controller
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
        $lttgds = Inventaris::where('lokasi','LIKE BINARY','%Lt.3 Gd.1%')->get();
        return view('lttgds.index', compact('lttgds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lttgds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLttGdSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLttGdSRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgds = new Lttgds();
        $lttgds->kode = $request->kode;
        $lttgds->namaBarang = $request->namaBarang;
        $lttgds->merk = $request->merk;
        $lttgds->jumlah = $request->jumlah;
        $lttgds->hargaSatuan = $request->hargaSatuan;
        $lttgds->lokasi = $request->lokasi;
        $lttgds->tahunPembuatan = $request->tahunPembuatan;
        $lttgds->tahunBeli = $request->tahunBeli;
        $lttgds->hargaKeseluruhan = $lttgds->jumlah * $lttgds->hargaSatuan;
        $lttgds->kondisi = $request->kondisi;
        $lttgds->save();
        return redirect()->route('lttgds.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LttGdS  $lttGdS
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lttgds =Lttgds::findOrFail($id);
        return view('lttgds.show', compact('lttgds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LttGdS  $lttGdS
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lttgds =Lttgds::findOrFail($id);
        return view('lttgds.edit', compact('lttgds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLttGdSRequest  $request
     * @param  \App\Models\LttGdS  $lttGdS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLttGdSRequest $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgds',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgds =Lttgds::findOrFail($id);
        $lttgds->kode = $request->kode;
        $lttgds->namaBarang = $request->namaBarang;
        $lttgds->merk = $request->merk;
        $lttgds->jumlah = $request->jumlah;
        $lttgds->hargaSatuan = $request->hargaSatuan;
        $lttgds->lokasi = $request->lokasi;
        $lttgds->tahunPembuatan = $request->tahunPembuatan;
        $lttgds->tahunBeli = $request->tahunBeli;
        $lttgds->hargaKeseluruhan = $lttgds->jumlah * $lttgds->hargaSatuan;
        $lttgds->kondisi = $request->kondisi;
        $lttgds->save();
        return redirect()->route('lttgds.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LttGdS  $lttGdS
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lttgds = Lttgds::findOrFail($id);
        $lttgds->delete();
        return redirect()->route('lttgds.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
