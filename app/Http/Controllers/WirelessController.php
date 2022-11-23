<?php

namespace App\Http\Controllers;

use App\Models\Wireless;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class WirelessController extends Controller
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
        $wireless = Inventaris::where('namaBarang','LIKE BINARY', '%wireless%')->get();
        return view('wireless.index', compact('wireless'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wireless.create');
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
            'kode' => 'required|unique:wireless',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $wireless = new Wireless();
        $wireless->kode = $request->kode;
        $wireless->namaBarang = $request->namaBarang;
        $wireless->merk = $request->merk;
        $wireless->jumlah = $request->jumlah;
        $wireless->hargaSatuan = $request->hargaSatuan;
        $wireless->lokasi = $request->lokasi;
        $wireless->tahunPembuatan = $request->tahunPembuatan;
        $wireless->tahunBeli = $request->tahunBeli;
        $wireless->hargaKeseluruhan = $wireless->jumlah * $wireless->hargaSatuan;
        $wireless->kondisi = $request->kondisi;
        $wireless->save();
        return redirect()->route('wireless.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wireless = Wireless::findOrFail($id);
        return view('wireless.show', compact('wireless'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wireless = Wireless::findOrFail($id);
        return view('wireless.edit', compact('wireless'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:wireless',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $wireless = Wireless::findOrFail($id);
        $wireless->kode = $request->kode;
        $wireless->namaBarang = $request->namaBarang;
        $wireless->merk = $request->merk;
        $wireless->jumlah = $request->jumlah;
        $wireless->hargaSatuan = $request->hargaSatuan;
        $wireless->lokasi = $request->lokasi;
        $wireless->tahunPembuatan = $request->tahunPembuatan;
        $wireless->tahunBeli = $request->tahunBeli;
        $wireless->hargaKeseluruhan = $wireless->jumlah * $wireless->hargaSatuan;
        $wireless->kondisi = $request->kondisi;
        $wireless->save();
        return redirect()->route('wireless.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wireless = Wireless::findOrFail($id);
        $wireless->delete();
        return redirect()->route('wireless.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
