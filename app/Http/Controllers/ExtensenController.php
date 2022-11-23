<?php

namespace App\Http\Controllers;

use App\Models\Extensen;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ExtensenController extends Controller
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
        $extensen = Inventaris::where('namaBarang','LIKE BINARY','%extensen%')->get();
        return view('extensen.index', compact('extensen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extensen.create');
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
            'kode' => 'required|unique:extensen',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $extensen = new Extensen();
        $extensen->kode = $request->kode;
        $extensen->namaBarang = $request->namaBarang;
        $extensen->merk = $request->merk;
        $extensen->jumlah = $request->jumlah;
        $extensen->hargaSatuan = $request->hargaSatuan;
        $extensen->lokasi = $request->lokasi;
        $extensen->tahunPembuatan = $request->tahunPembuatan;
        $extensen->tahunBeli = $request->tahunBeli;
        $extensen->hargaKeseluruhan = $extensen->jumlah * $extensen->hargaSatuan;
        $extensen->kondisi = $request->kondisi;
        $extensen->save();
        return redirect()->route('extensen.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extensen  $extensen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extensen = Extensen::findOrFail($id);
        return view('extensen.show', compact('extensen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extensen  $extensen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extensen = Extensen::findOrFail($id);
        return view('extensen.edit', compact('extensen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extensen  $extensen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:extensen',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $extensen = Extensen::findOrFail($id);
        $extensen->kode = $request->kode;
        $extensen->namaBarang = $request->namaBarang;
        $extensen->merk = $request->merk;
        $extensen->jumlah = $request->jumlah;
        $extensen->hargaSatuan = $request->hargaSatuan;
        $extensen->lokasi = $request->lokasi;
        $extensen->tahunPembuatan = $request->tahunPembuatan;
        $extensen->tahunBeli = $request->tahunBeli;
        $extensen->hargaKeseluruhan = $extensen->jumlah * $extensen->hargaSatuan;
        $extensen->kondisi = $request->kondisi;
        $extensen->save();
        return redirect()->route('extensen.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extensen  $extensen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extensen = Extensen::findOrFail($id);
        $extensen->delete();
        return redirect()->route('extensen.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
