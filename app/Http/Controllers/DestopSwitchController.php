<?php

namespace App\Http\Controllers;

use App\Models\DestopSwitch;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class DestopSwitchController extends Controller
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
        $destopswitch = Inventaris::where('namaBarang','LIKE BINARY','%destopswitch%')->get();
        return view('destopswitch.index', compact('destopswitch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destopswitch.create');
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
            'kode' => 'required|unique:destopswitch',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $destopswitch = new DestopSwitch();
        $destopswitch->kode = $request->kode;
        $destopswitch->namaBarang = $request->namaBarang;
        $destopswitch->merk = $request->merk;
        $destopswitch->jumlah = $request->jumlah;
        $destopswitch->hargaSatuan = $request->hargaSatuan;
        $destopswitch->lokasi = $request->lokasi;
        $destopswitch->tahunPembuatan = $request->tahunPembuatan;
        $destopswitch->tahunBeli = $request->tahunBeli;
        $destopswitch->hargaKeseluruhan = $destopswitch->jumlah * $destopswitch->hargaSatuan;
        $destopswitch->kondisi = $request->kondisi;
        $destopswitch->save();
        return redirect()->route('destopswitch.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DestopSwitch  $destopSwitch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destopswitch = DestopSwitch::findOrFail($id);
        return view('destopswitch.show', compact('destopswitch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DestopSwitch  $destopSwitch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destopswitch = DestopSwitch::findOrFail($id);
        return view('destopswitch.edit', compact('destopswitch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DestopSwitch  $destopSwitch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:destopswitch',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $destopswitch = DestopSwitch::findOrFail($id);
        $destopswitch->kode = $request->kode;
        $destopswitch->namaBarang = $request->namaBarang;
        $destopswitch->merk = $request->merk;
        $destopswitch->jumlah = $request->jumlah;
        $destopswitch->hargaSatuan = $request->hargaSatuan;
        $destopswitch->lokasi = $request->lokasi;
        $destopswitch->tahunPembuatan = $request->tahunPembuatan;
        $destopswitch->tahunBeli = $request->tahunBeli;
        $destopswitch->hargaKeseluruhan = $destopswitch->jumlah * $destopswitch->hargaSatuan;
        $destopswitch->kondisi = $request->kondisi;
        $destopswitch->save();
        return redirect()->route('destopswitch.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DestopSwitch  $destopSwitch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destopswitch = DestopSwitch::findOrFail($id);
        $destopswitch->delete();
        return redirect()->route('destopswitch.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
