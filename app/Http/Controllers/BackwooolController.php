<?php

namespace App\Http\Controllers;

use App\Models\Backwoool;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class BackwooolController extends Controller
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
        $backwoool = Inventaris::where('namaBarang','LIKE BINARY','%Backwool%')->get();
        return view('backwoool.index', compact('backwoool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backwoool.create');
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
            'kode' => 'required|unique:backwoool',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $backwoool = new Backwoool();
        $backwoool->kode = $request->kode;
        $backwoool->namaBarang = $request->namaBarang;
        $backwoool->merk = $request->merk;
        $backwoool->jumlah = $request->jumlah;
        $backwoool->hargaSatuan = $request->hargaSatuan;
        $backwoool->lokasi = $request->lokasi;
        $backwoool->tahunPembuatan = $request->tahunPembuatan;
        $backwoool->tahunBeli = $request->tahunBeli;
        $backwoool->hargaKeseluruhan = $backwoool->jumlah * $backwoool->hargaSatuan;
        $backwoool->kondisi = $request->kondisi;
        $backwoool->save();
        return redirect()->route('backwoool.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backwoool  $backwoool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $backwoool = Backwoool::findOrFail($id);
        return view('backwoool.show', compact('backwoool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backwoool  $backwoool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $backwoool = Backwoool::findOrFail($id);
        return view('backwoool.edit', compact('backwoool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backwoool  $backwoool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:backwoool',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $backwoool = Backwoool::findOrFail($id);
        $backwoool->kode = $request->kode;
        $backwoool->namaBarang = $request->namaBarang;
        $backwoool->merk = $request->merk;
        $backwoool->jumlah = $request->jumlah;
        $backwoool->hargaSatuan = $request->hargaSatuan;
        $backwoool->lokasi = $request->lokasi;
        $backwoool->tahunPembuatan = $request->tahunPembuatan;
        $backwoool->tahunBeli = $request->tahunBeli;
        $backwoool->hargaKeseluruhan = $backwoool->jumlah * $backwoool->hargaSatuan;
        $backwoool->kondisi = $request->kondisi;
        $backwoool->save();
        return redirect()->route('backwoool.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backwoool  $backwoool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $backwoool = Backwoool::findOrFail($id);
        $backwoool->delete();
        return redirect()->route('backwoool.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
