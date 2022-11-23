<?php

namespace App\Http\Controllers;

use App\Models\LtTGdD;
use App\Models\Inventaris;
use App\Http\Requests\StoreLtTGdDRequest;
use App\Http\Requests\UpdateLtTGdDRequest;

class LtTGdDController extends Controller
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
        $lttgdd = Inventaris::where('lokasi','LIKE BINARY','%Lt.3 Gd.2%')->get();
        return view('lttgdd.index', compact('lttgdd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lttgdd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLtTGdDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtTGdDRequest $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgdd = new LtTGdD();
        $lttgdd->kode = $request->kode;
        $lttgdd->namaBarang = $request->namaBarang;
        $lttgdd->merk = $request->merk;
        $lttgdd->jumlah = $request->jumlah;
        $lttgdd->hargaSatuan = $request->hargaSatuan;
        $lttgdd->lokasi = $request->lokasi;
        $lttgdd->tahunPembuatan = $request->tahunPembuatan;
        $lttgdd->tahunBeli = $request->tahunBeli;
        $lttgdd->hargaKeseluruhan = $lttgdd->jumlah * $lttgdd->hargaSatuan;
        $lttgdd->kondisi = $request->kondisi;
        $lttgdd->save();
        return redirect()->route('lttgdd.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LtTGdD  $ltTGdD
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lttgdd =LtTGdD::findOrFail($id);
        return view('lttgdd.show', compact('lttgdd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LtTGdD  $ltTGdD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lttgdd =LtTGdD::findOrFail($id);
        return view('lttgdd.edit', compact('lttgdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLtTGdDRequest  $request
     * @param  \App\Models\LtTGdD  $ltTGdD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLtTGdDRequest $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:lttgdd',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $lttgdd =LtTGdD::findOrFail($id);
        $lttgdd->kode = $request->kode;
        $lttgdd->namaBarang = $request->namaBarang;
        $lttgdd->merk = $request->merk;
        $lttgdd->jumlah = $request->jumlah;
        $lttgdd->hargaSatuan = $request->hargaSatuan;
        $lttgdd->lokasi = $request->lokasi;
        $lttgdd->tahunPembuatan = $request->tahunPembuatan;
        $lttgdd->tahunBeli = $request->tahunBeli;
        $lttgdd->hargaKeseluruhan = $lttgdd->jumlah * $lttgdd->hargaSatuan;
        $lttgdd->kondisi = $request->kondisi;
        $lttgdd->save();
        return redirect()->route('lttgdd.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LtTGdD  $ltTGdD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lttgdd = LtTGdD::findOrFail($id);
        $lttgdd->delete();
        return redirect()->route('lttgdd.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
