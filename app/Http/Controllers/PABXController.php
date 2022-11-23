<?php

namespace App\Http\Controllers;

use App\Models\PABX;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PABXController extends Controller
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
        $pabx = Inventaris::where('namaBarang','LIKE BINARY', '%PABX%')->get();
        return view('pabx.index', compact('pabx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pabx.create');
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
            'kode' => 'required|unique:pabx',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $pabx = new PABX();
        $pabx->kode = $request->kode;
        $pabx->namaBarang = $request->namaBarang;
        $pabx->merk = $request->merk;
        $pabx->jumlah = $request->jumlah;
        $pabx->hargaSatuan = $request->hargaSatuan;
        $pabx->lokasi = $request->lokasi;
        $pabx->tahunPembuatan = $request->tahunPembuatan;
        $pabx->tahunBeli = $request->tahunBeli;
        $pabx->hargaKeseluruhan = $pabx->jumlah * $pabx->hargaSatuan;
        $pabx->kondisi = $request->kondisi;
        $pabx->save();
        return redirect()->route('pabx.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PABX  $pABX
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pabx = PABX::findOrFail($id);
        return view('pabx.show', compact('pabx'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PABX  $pABX
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pabx = PABX::findOrFail($id);
        return view('pabx.edit', compact('pabx'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PABX  $pABX
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:pabx',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $pabx = PABX::findOrFail($id);
        $pabx->kode = $request->kode;
        $pabx->namaBarang = $request->namaBarang;
        $pabx->merk = $request->merk;
        $pabx->jumlah = $request->jumlah;
        $pabx->hargaSatuan = $request->hargaSatuan;
        $pabx->lokasi = $request->lokasi;
        $pabx->tahunPembuatan = $request->tahunPembuatan;
        $pabx->tahunBeli = $request->tahunBeli;
        $pabx->hargaKeseluruhan = $pabx->jumlah * $pabx->hargaSatuan;
        $pabx->kondisi = $request->kondisi;
        $pabx->save();
        return redirect()->route('pabx.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PABX  $pABX
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pabx = PABX::findOrFail($id);
        $pabx->delete();
        return redirect()->route('pabx.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
