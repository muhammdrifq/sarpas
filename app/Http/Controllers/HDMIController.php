<?php

namespace App\Http\Controllers;

use App\Models\HDMI;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class HDMIController extends Controller
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
        $hdmi = Inventaris::where('namaBarang','LIKE BINARY','%hdmi%')->get();
        return view('hdmi.index', compact('hdmi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hdmi.create');
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
            'kode' => 'required|unique:hdmi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $hdmi = new hdmi();
        $hdmi->kode = $request->kode;
        $hdmi->namaBarang = $request->namaBarang;
        $hdmi->merk = $request->merk;
        $hdmi->jumlah = $request->jumlah;
        $hdmi->hargaSatuan = $request->hargaSatuan;
        $hdmi->lokasi = $request->lokasi;
        $hdmi->tahunPembuatan = $request->tahunPembuatan;
        $hdmi->tahunBeli = $request->tahunBeli;
        $hdmi->hargaKeseluruhan = $hdmi->jumlah * $hdmi->hargaSatuan;
        $hdmi->kondisi = $request->kondisi;
        $hdmi->save();
        return redirect()->route('hdmi.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HDMI  $hDMI
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hdmi = hdmi::findOrFail($id);
        return view('hdmi.show', compact('hdmi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HDMI  $hDMI
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hdmi = hdmi::findOrFail($id);
        return view('hdmi.edit', compact('hdmi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HDMI  $hDMI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:hdmi',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $hdmi = HDMI::findOrFail($id);
        $hdmi->kode = $request->kode;
        $hdmi->namaBarang = $request->namaBarang;
        $hdmi->merk = $request->merk;
        $hdmi->jumlah = $request->jumlah;
        $hdmi->hargaSatuan = $request->hargaSatuan;
        $hdmi->lokasi = $request->lokasi;
        $hdmi->tahunPembuatan = $request->tahunPembuatan;
        $hdmi->tahunBeli = $request->tahunBeli;
        $hdmi->hargaKeseluruhan = $hdmi->jumlah * $hdmi->hargaSatuan;
        $hdmi->kondisi = $request->kondisi;
        $hdmi->save();
        return redirect()->route('hdmi.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HDMI  $hdmi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hdmi = HDMI::findOrFail($id);
        $hdmi->delete();
        return redirect()->route('hdmi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
