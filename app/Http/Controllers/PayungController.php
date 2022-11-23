<?php

namespace App\Http\Controllers;

use App\Models\Payung;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PayungController extends Controller
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
        $payung = Inventaris::where('namaBarang','LIKE BINARY', '%Payung%')->get();
        return view('payung.index', compact('payung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payung.create');
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
            'kode' => 'required|unique:payung',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $payung = new Payung();
        $payung->kode = $request->kode;
        $payung->namaBarang = $request->namaBarang;
        $payung->merk = $request->merk;
        $payung->jumlah = $request->jumlah;
        $payung->hargaSatuan = $request->hargaSatuan;
        $payung->lokasi = $request->lokasi;
        $payung->tahunPembuatan = $request->tahunPembuatan;
        $payung->tahunBeli = $request->tahunBeli;
        $payung->hargaKeseluruhan = $payung->jumlah * $payung->hargaSatuan;
        $payung->kondisi = $request->kondisi;
        $payung->save();
        return redirect()->route('payung.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payung  $payung
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payung = Payung::findOrFail($id);
        return view('payung.show', compact('payung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payung  $payung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payung = Payung::findOrFail($id);
        return view('payung.edit', compact('payung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payung  $payung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:payung',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $payung = Payung::findOrFail($id);
        $payung->kode = $request->kode;
        $payung->namaBarang = $request->namaBarang;
        $payung->merk = $request->merk;
        $payung->jumlah = $request->jumlah;
        $payung->hargaSatuan = $request->hargaSatuan;
        $payung->lokasi = $request->lokasi;
        $payung->tahunPembuatan = $request->tahunPembuatan;
        $payung->tahunBeli = $request->tahunBeli;
        $payung->hargaKeseluruhan = $payung->jumlah * $payung->hargaSatuan;
        $payung->kondisi = $request->kondisi;
        $payung->save();
        return redirect()->route('payung.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payung  $payung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payung = Payung::findOrFail($id);
        $payung->delete();
        return redirect()->route('payung.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
