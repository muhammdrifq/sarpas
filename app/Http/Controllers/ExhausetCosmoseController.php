<?php

namespace App\Http\Controllers;

use App\Models\ExhausetCosmose;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ExhausetCosmoseController extends Controller
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
        $exhausetcosmose = Inventaris::where('namaBarang','LIKE BINARY','%Exhausetcosmose%')->get();
        return view('exhausetcosmose.index', compact('exhausetcosmose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exhausetcosmose.create');
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
            'kode' => 'required|unique:exhausetcosmose',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $exhausetcosmose = new ExhausetCosmose();
        $exhausetcosmose->kode = $request->kode;
        $exhausetcosmose->namaBarang = $request->namaBarang;
        $exhausetcosmose->merk = $request->merk;
        $exhausetcosmose->jumlah = $request->jumlah;
        $exhausetcosmose->hargaSatuan = $request->hargaSatuan;
        $exhausetcosmose->lokasi = $request->lokasi;
        $exhausetcosmose->tahunPembuatan = $request->tahunPembuatan;
        $exhausetcosmose->tahunBeli = $request->tahunBeli;
        $exhausetcosmose->hargaKeseluruhan = $exhausetcosmose->jumlah * $exhausetcosmose->hargaSatuan;
        $exhausetcosmose->kondisi = $request->kondisi;
        $exhausetcosmose->save();
        return redirect()->route('exhausetcosmose.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExhausetCosmose  $exhausetcosmose
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exhausetcosmose = ExhausetCosmose::findOrFail($id);
        return view('exhausetcosmose.show', compact('exhausetcosmose'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExhausetCosmose  $exhausetcosmose
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exhausetcosmose = ExhausetCosmose::findOrFail($id);
        return view('exhausetcosmose.edit', compact('exhausetcosmose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExhausetCosmose  $exhausetcosmose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:exhausetcosmose',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $exhausetcosmose = ExhausetCosmose::findOrFail($id);
        $exhausetcosmose->kode = $request->kode;
        $exhausetcosmose->namaBarang = $request->namaBarang;
        $exhausetcosmose->merk = $request->merk;
        $exhausetcosmose->jumlah = $request->jumlah;
        $exhausetcosmose->hargaSatuan = $request->hargaSatuan;
        $exhausetcosmose->lokasi = $request->lokasi;
        $exhausetcosmose->tahunPembuatan = $request->tahunPembuatan;
        $exhausetcosmose->tahunBeli = $request->tahunBeli;
        $exhausetcosmose->hargaKeseluruhan = $exhausetcosmose->jumlah * $exhausetcosmose->hargaSatuan;
        $exhausetcosmose->kondisi = $request->kondisi;
        $exhausetcosmose->save();
        return redirect()->route('exhausetcosmose.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhausetcosmose  $exhausetcosmose
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exhausetcosmose = ExhausetCosmose::findOrFail($id);
        $exhausetcosmose->delete();
        return redirect()->route('exhausetcosmose.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
