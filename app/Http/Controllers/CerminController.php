<?php

namespace App\Http\Controllers;

use App\Models\Cermin;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class CerminController extends Controller
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
        $cermin = Inventaris::where('namaBarang','LIKE BINARY','%Cermin%')->get();
        return view('cermin.index', compact('cermin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cermin.create');
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
            'kode' => 'required|unique:cermin',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cermin = new Cermin();
        $cermin->kode = $request->kode;
        $cermin->namaBarang = $request->namaBarang;
        $cermin->merk = $request->merk;
        $cermin->jumlah = $request->jumlah;
        $cermin->hargaSatuan = $request->hargaSatuan;
        $cermin->lokasi = $request->lokasi;
        $cermin->tahunPembuatan = $request->tahunPembuatan;
        $cermin->tahunBeli = $request->tahunBeli;
        $cermin->hargaKeseluruhan = $cermin->jumlah * $cermin->hargaSatuan;
        $cermin->kondisi = $request->kondisi;
        $cermin->save();
        return redirect()->route('cermin.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cermin  $cermin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cermin = cermin::findOrFail($id);
        return view('cermin.show', compact('cermin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cermin  $cermin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cermin = cermin::findOrFail($id);
        return view('cermin.edit', compact('cermin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cermin  $cermin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:cermin',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cermin = cermin::findOrFail($id);
        $cermin->kode = $request->kode;
        $cermin->namaBarang = $request->namaBarang;
        $cermin->merk = $request->merk;
        $cermin->jumlah = $request->jumlah;
        $cermin->hargaSatuan = $request->hargaSatuan;
        $cermin->lokasi = $request->lokasi;
        $cermin->tahunPembuatan = $request->tahunPembuatan;
        $cermin->tahunBeli = $request->tahunBeli;
        $cermin->hargaKeseluruhan = $cermin->jumlah * $cermin->hargaSatuan;
        $cermin->kondisi = $request->kondisi;
        $cermin->save();
        return redirect()->route('cermin.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cermin  $cermin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cermin = Cermin::findOrFail($id);
        $cermin->delete();
        return redirect()->route('cermin.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
