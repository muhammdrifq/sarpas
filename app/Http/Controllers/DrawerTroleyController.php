<?php

namespace App\Http\Controllers;

use App\Models\DrawerTroley;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class DrawerTroleyController extends Controller
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
        $drawertroley = Inventaris::where('namaBarang','LIKE BINARY','%Drawer Troley%')->get();
        return view('drawertroley.index', compact('drawertroley'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drawertroley.create');
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
            'kode' => 'required|unique:drawertroley',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $drawertroley = new DrawerTroley();
        $drawertroley->kode = $request->kode;
        $drawertroley->namaBarang = $request->namaBarang;
        $drawertroley->merk = $request->merk;
        $drawertroley->jumlah = $request->jumlah;
        $drawertroley->hargaSatuan = $request->hargaSatuan;
        $drawertroley->lokasi = $request->lokasi;
        $drawertroley->tahunPembuatan = $request->tahunPembuatan;
        $drawertroley->tahunBeli = $request->tahunBeli;
        $drawertroley->hargaKeseluruhan = $drawertroley->jumlah * $drawertroley->hargaSatuan;
        $drawertroley->kondisi = $request->kondisi;
        $drawertroley->save();
        return redirect()->route('drawertroley.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrawerTroley  $drawerTroley
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drawertroley = DrawerTroley::findOrFail($id);
        return view('drawertroley.show', compact('drawertroley'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrawerTroley  $drawerTroley
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drawertroley = DrawerTroley::findOrFail($id);
        return view('drawertroley.edit', compact('drawertroley'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrawerTroley  $drawerTroley
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:drawertroley',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $drawertroley = DrawerTroley::findOrFail($id);
        $drawertroley->kode = $request->kode;
        $drawertroley->namaBarang = $request->namaBarang;
        $drawertroley->merk = $request->merk;
        $drawertroley->jumlah = $request->jumlah;
        $drawertroley->hargaSatuan = $request->hargaSatuan;
        $drawertroley->lokasi = $request->lokasi;
        $drawertroley->tahunPembuatan = $request->tahunPembuatan;
        $drawertroley->tahunBeli = $request->tahunBeli;
        $drawertroley->hargaKeseluruhan = $drawertroley->jumlah * $drawertroley->hargaSatuan;
        $drawertroley->kondisi = $request->kondisi;
        $drawertroley->save();
        return redirect()->route('drawertroley.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrawerTroley  $drawerTroley
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drawertroley = DrawerTroley::findOrFail($id);
        $drawertroley->delete();
        return redirect()->route('drawertroley.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
