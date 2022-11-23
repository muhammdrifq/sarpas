<?php

namespace App\Http\Controllers;

use App\Models\JackCanon;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class JackCanonController extends Controller
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
        $jackcanon = Inventaris::where('namaBarang','LIKE BINARY','%JackCanon%')->get();
        return view('jackcanon.index', compact('jackcanon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jackcanon.create');
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
            'kode' => 'required|unique:jackcanon',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jackcanon = new JackCanon();
        $jackcanon->kode = $request->kode;
        $jackcanon->namaBarang = $request->namaBarang;
        $jackcanon->merk = $request->merk;
        $jackcanon->jumlah = $request->jumlah;
        $jackcanon->hargaSatuan = $request->hargaSatuan;
        $jackcanon->lokasi = $request->lokasi;
        $jackcanon->tahunPembuatan = $request->tahunPembuatan;
        $jackcanon->tahunBeli = $request->tahunBeli;
        $jackcanon->hargaKeseluruhan = $jackcanon->jumlah * $jackcanon->hargaSatuan;
        $jackcanon->kondisi = $request->kondisi;
        $jackcanon->save();
        return redirect()->route('jackcanon.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JackCanon  $jackCanon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jackcanon = Jackcanon::findOrFail($id);
        return view('jackcanon.show', compact('jackcanon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JackCanon  $jackCanon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jackcanon = Jackcanon::findOrFail($id);
        return view('jackcanon.edit', compact('jackcanon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JackCanon  $jackCanon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jackcanon',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $jackcanon = Jackcanon::findOrFail($id);
        $jackcanon->kode = $request->kode;
        $jackcanon->namaBarang = $request->namaBarang;
        $jackcanon->merk = $request->merk;
        $jackcanon->jumlah = $request->jumlah;
        $jackcanon->hargaSatuan = $request->hargaSatuan;
        $jackcanon->lokasi = $request->lokasi;
        $jackcanon->tahunPembuatan = $request->tahunPembuatan;
        $jackcanon->tahunBeli = $request->tahunBeli;
        $jackcanon->hargaKeseluruhan = $jackcanon->jumlah * $jackcanon->hargaSatuan;
        $jackcanon->kondisi = $request->kondisi;
        $jackcanon->save();
        return redirect()->route('jackcanon.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JackCanon  $jackCanon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jackcanon = Jackcanon::findOrFail($id);
        $jackcanon->delete();
        return redirect()->route('jackcanon.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
